<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\ProductoRelacionado;
use App\Models\Tipo;
use App\Models\TipoProducto;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
// use Illuminate\Http\File;
use Illuminate\Support\Facades\File;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('page.admin.producto.listado')->with('productos',$productos);
    }

    public function papelera(Request $request)
    {
        Producto::find($request->id)->delete();   
        
        return redirect('/admin/productos/');
    }

    public function publicar(Request $request)
    {
        
        $update = Producto::find($request["id"]);
        $update->activo = $request["activo"];
        $update->save();

        return redirect('/admin/productos/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();

        $tipo = Tipo::all();

        $colors = Tipo::where('id_categoria_tipo',1)->get();
        $chapas = Tipo::where('id_categoria_tipo',2)->get();
        $puertas = Tipo::where('id_categoria_tipo',3)->get();
        $cuerpos = Tipo::where('id_categoria_tipo',4)->get();

        // $arrTipo = array_push($colors,$chapas,$puertas,$cuerpo);

        // dd($colors);


        return view('page.admin.producto.crear')->with('categorias',$categorias)
                                                ->with('colors',$colors)
                                                ->with('chapas',$chapas)
                                                ->with('puertas',$puertas)
                                                ->with('cuerpos',$cuerpos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);

        $datos = $request->validate([
            'nombre' => 'required|max:40|min:2|unique:productos',
            'descripcion' => 'required|min:2',
            'id_categoria' => 'required',
        ]);

        $slug = Str::slug($datos["nombre"]);


        // Insertar Datos Eloquent/ORM

        $productoDB = Producto::create([
            'nombre' => $datos["nombre"],
            'descripcion' => $datos["descripcion"],
            'id_categoria' => $datos["id_categoria"],
            'slug' => $slug,
            'usos' => $request["usos"],
            'descripcion_corta' => $request["descripcion_corta"],
            'subtitulo' => $request["subtitulo"],
            'altura' => $request["altura"],
            'ancho' => $request["ancho"],
            'fondo' => $request["fondo"],
            'alto' => $request["alto"],
            'ancho_puerta' => $request["ancho_puerta"],
            'material' => $request["material"],
            'pintura' => $request["pintura"],
            'puertas_reforzadas' => $request["puertas_reforzadas"],
            'bisagras' => $request["bisagras"],
            'accesorios' => $request["accesorios"],
            'garantia' => $request["garantia"],
            'activo' => 1,
        ]);


        // Relacionar los productos

        // $allProductos = Producto::where('id', '!=', $productoDB->id)->get();
        $allProductos = Producto::all();

        foreach ($allProductos as $allProduct)
        {
            $allProductos2 = Producto::where('id', '!=', $allProduct->id)->get();
            foreach ($allProductos2 as $allProduct2){
                $buscar = ProductoRelacionado::where('id_producto', $allProduct->id)->where('id_producto_relacionado', $allProduct2->id)->get();
                if (count($buscar) == 0) {
                    ProductoRelacionado::create([
                        'id_producto' => $allProduct->id,
                        'id_producto_relacionado' => $allProduct2->id,
                        'estado' => 0
                    ]);
                }
            }
            
        }

        if ($request->hasFile("banner"))
        {
            $imagen = $request->file("banner");
            
            $nombreimagen = $productoDB->id . "-banner-" . time() .".".$imagen->guessExtension();

            $path = Storage::disk('products')->putFileAs($productoDB->id,$imagen,$nombreimagen);
            
            $imageSave = '/images/products/'.$path;

            $productoDB->fill([
                'banner' => $imageSave,
            ])->save();
            
        }else{
            // dd("No hay imagen");
        }

        if ($request->hasFile("ficha"))
        {
            $imagen2 = $request->file("ficha");
            
            $nombreimagen2 = $productoDB->id . "-ficha-" . time() .".".$imagen2->guessExtension();

            $path2 = Storage::disk('products')->putFileAs($productoDB->id,$imagen2,$nombreimagen2);
            
            $imageSave2 = '/images/products/'.$path2;

            $productoDB->fill([
                'ficha' => $imageSave2,
            ])->save();
            
        }else{
            // dd("No hay imagen");
        }


        // procedemos a llenar en la tabla tipo productos

        $idProducto = $productoDB->id;

        
        $request["color_ids"] = $request["color_ids"] ?? [];
        $request["chapas_ids"] = $request["chapas_ids"] ?? [];
        $request["puertas_ids"] = $request["puertas_ids"] ?? [];
        $request["cuerpos_ids"] = $request["cuerpos_ids"] ?? [];


        foreach($request["color_ids"] as $valor){
            TipoProducto::create([
                'id_producto' => $idProducto,
                'id_tipo' => $valor
            ]);
        }

        foreach($request["chapas_ids"] as $valor){
            TipoProducto::create([
                'id_producto' => $idProducto,
                'id_tipo' => $valor
            ]);
        }

        foreach($request["puertas_ids"] as $valor){
            TipoProducto::create([
                'id_producto' => $idProducto,
                'id_tipo' => $valor
            ]);
        }

        foreach($request["cuerpos_ids"] as $valor){
            TipoProducto::create([
                'id_producto' => $idProducto,
                'id_tipo' => $valor
            ]);
        }


        return redirect('/admin/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Producto $producto)
    {

        $categorias = Categoria::all();

        $producto = $producto::all();
        $producto = $producto->find($id);
        $tipos    = $producto->tiposMuchos()->pluck('id_tipo')->toArray();

        $colors = Tipo::where('id_categoria_tipo',1)->get();
        $chapas = Tipo::where('id_categoria_tipo',2)->get();
        $puertas = Tipo::where('id_categoria_tipo',3)->get();
        $cuerpos = Tipo::where('id_categoria_tipo',4)->get();

        return view('page.admin.producto.editar')->with('categorias',$categorias)
                                                ->with('producto',$producto)
                                                ->with('tipos',$tipos)
                                                ->with('colors',$colors)
                                                ->with('chapas',$chapas)
                                                ->with('puertas',$puertas)
                                                ->with('cuerpos',$cuerpos);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        
        $producto = $producto->all();
        $producto = $producto->find($request["id"]);

        $update = Producto::find($request["id"]);

        if ($producto->nombre != $request["nombre"]){
            $datos = $request->validate([
                'nombre' => 'required|string|max:40|min:2|unique:productos',
            ]);  

            $slug = Str::slug($datos["nombre"]);
            $update->slug = $slug;
            $update->nombre = $datos["nombre"];
            
        }else{
            $slug = $request["slug"];
        }


        
        $update->descripcion = $request["descripcion"];
        $update->id_categoria = $request["id_categoria"];
        $update->usos = $request["usos"];
        $update->descripcion_corta = $request["descripcion_corta"];
        $update->subtitulo = $request["subtitulo"];
        $update->altura = $request["altura"];
        $update->ancho = $request["ancho"];
        $update->fondo = $request["fondo"];
        $update->alto = $request["alto"];
        $update->ancho_puerta = $request["ancho_puerta"];
        $update->material = $request["material"];
        $update->pintura = $request["pintura"];
        $update->puertas_reforzadas = $request["puertas_reforzadas"];
        $update->bisagras = $request["bisagras"];
        $update->accesorios = $request["accesorios"];
        $update->garantia = $request["garantia"];

        $update->save();


        if ($request->hasFile("banner"))
        {
            $imagen = $request->file("banner");
            
            $nombreimagen = $request["id"] . "-banner-" . time() .".".$imagen->guessExtension();

            $path = Storage::disk('products')->putFileAs($request["id"],$imagen,$nombreimagen);

            // Esto es para un hosting
            // $destinationPath = public_path('images/products').'/'.$request["id"];
            // if(!File::isDirectory($destinationPath)){
            //     File::makeDirectory($destinationPath, 0777, true, true);
            // }
            // fin 
            
            $imageSave = '/images/products/'.$path;

            $update->fill([
                'banner' => $imageSave,
            ])->save();
            
        }else{
            // dd("No hay imagen");
        }

        if ($request->hasFile("ficha"))
        {
            $imagen2 = $request->file("ficha");
            
            $nombreimagen2 = $request["id"] . "-ficha-" . time() .".".$imagen2->guessExtension();

            $path2 = Storage::disk('products')->putFileAs($request["id"],$imagen2,$nombreimagen2);
            
            $imageSave2 = '/images/products/'.$path2;

            $update->fill([
                'ficha' => $imageSave2,
            ])->save();
            
        }else{
            // dd("No hay imagen");
        }


        // Validamos que no vengan vacios
        
        $request["color_ids"] = $request["color_ids"] ?? [];
        $request["chapas_ids"] = $request["chapas_ids"] ?? [];
        $request["puertas_ids"] = $request["puertas_ids"] ?? [];
        $request["cuerpos_ids"] = $request["cuerpos_ids"] ?? [];


        // La seccion de Colores

        $_arrayElements = $producto->tiposMuchos()
                    ->select('categoria_tipos.id','categoria_tipos.nombre as categoria', 'tipo_productos.id_tipo','tipos.nombre as tipo')
                    ->join('tipos','tipos.id','=','tipo_productos.id_tipo')
                    ->join('categoria_tipos','tipos.id_categoria_tipo','=','categoria_tipos.id')
                    ->where('categoria_tipos.id',1)
                    ->get();

        $idElements = $_arrayElements->pluck('id_tipo')->toArray();

        $newArrayElements = $request["color_ids"];

        if ($request["color_ids"]){
            $elementsIdDelete = array_diff($idElements,$newArrayElements);
            $elementsIdAdd = array_diff($newArrayElements,$idElements);
        }else{
            $elementsIdDelete = $idElements;
            $elementsIdAdd = [];
        }

        // dd($elementsIdDelete);

        if (count($elementsIdDelete)){
            $producto->tiposMuchos()->where("id_producto",$request["id"])->whereIn('id_tipo',$elementsIdDelete)->delete();
        }

        foreach($elementsIdAdd as $element_id){
            TipoProducto::create([
                'id_producto'=> $request["id"],
                'id_tipo'=>$element_id
            ]);

        }

        // La seccion de Chapas

        $_arrayElements = $producto->tiposMuchos()
                    ->select('categoria_tipos.id','categoria_tipos.nombre as categoria', 'tipo_productos.id_tipo','tipos.nombre as tipo')
                    ->join('tipos','tipos.id','=','tipo_productos.id_tipo')
                    ->join('categoria_tipos','tipos.id_categoria_tipo','=','categoria_tipos.id')
                    ->where('categoria_tipos.id',2)
                    ->get();

        $idElements = $_arrayElements->pluck('id_tipo')->toArray();

        $newArrayElements = $request["chapas_ids"];

        if ($request["chapas_ids"]){
            $elementsIdDelete = array_diff($idElements,$newArrayElements);
            $elementsIdAdd = array_diff($newArrayElements,$idElements);
        }else{
            $elementsIdDelete = $idElements;
            $elementsIdAdd = [];
        }

        // dd($elementsIdDelete);

        if (count($elementsIdDelete)){
            $producto->tiposMuchos()->where("id_producto",$request["id"])->whereIn('id_tipo',$elementsIdDelete)->delete();
        }

        foreach($elementsIdAdd as $element_id){
            TipoProducto::create([
                'id_producto'=> $request["id"],
                'id_tipo'=>$element_id
            ]);

        }

        // La seccion de Puertas

        $_arrayElements = $producto->tiposMuchos()
                    ->select('categoria_tipos.id','categoria_tipos.nombre as categoria', 'tipo_productos.id_tipo','tipos.nombre as tipo')
                    ->join('tipos','tipos.id','=','tipo_productos.id_tipo')
                    ->join('categoria_tipos','tipos.id_categoria_tipo','=','categoria_tipos.id')
                    ->where('categoria_tipos.id',3)
                    ->get();

        $idElements = $_arrayElements->pluck('id_tipo')->toArray();

        $newArrayElements = $request["puertas_ids"];

        if ($request["puertas_ids"]){
            $elementsIdDelete = array_diff($idElements,$newArrayElements);
            $elementsIdAdd = array_diff($newArrayElements,$idElements);
        }else{
            $elementsIdDelete = $idElements;
            $elementsIdAdd = [];
        }

        // dd($elementsIdDelete);

        if (count($elementsIdDelete)){
            $producto->tiposMuchos()->where("id_producto",$request["id"])->whereIn('id_tipo',$elementsIdDelete)->delete();
        }

        foreach($elementsIdAdd as $element_id){
            TipoProducto::create([
                'id_producto'=> $request["id"],
                'id_tipo'=>$element_id
            ]);

        }

        // La seccion de Cuerpos

        $_arrayElements = $producto->tiposMuchos()
                                ->select('categoria_tipos.id','categoria_tipos.nombre as categoria', 'tipo_productos.id_tipo','tipos.nombre as tipo')
                                ->join('tipos','tipos.id','=','tipo_productos.id_tipo')
                                ->join('categoria_tipos','tipos.id_categoria_tipo','=','categoria_tipos.id')
                                ->where('categoria_tipos.id',4)
                                ->get();

        $idElements = $_arrayElements->pluck('id_tipo')->toArray();

        $newArrayElements = $request["cuerpos_ids"];

        if ($request["cuerpos_ids"]){
            $elementsIdDelete = array_diff($idElements,$newArrayElements);
            $elementsIdAdd = array_diff($newArrayElements,$idElements);
        }else{
            $elementsIdDelete = $idElements;
            $elementsIdAdd = [];
        }

        // dd($elementsIdDelete);

        if (count($elementsIdDelete)){
            $producto->tiposMuchos()->where("id_producto",$request["id"])->whereIn('id_tipo',$elementsIdDelete)->delete();
        }

        foreach($elementsIdAdd as $element_id){
            TipoProducto::create([
                'id_producto'=> $request["id"],
                'id_tipo'=>$element_id
            ]);
            
        }

        // fin

        return redirect('/admin/productos/editar/'.$request["id"]);

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
