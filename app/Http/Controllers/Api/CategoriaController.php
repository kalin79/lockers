<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Tipo;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

// para mis validaciones de respuesta con Api Rest con Json 

use App\Traits\ApiResponse;

class CategoriaController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        // dd(1);
        
        // $categorias = Categoria::orderBy('created_at','desc')->paginate(2);

        // return response()->json($categorias);
        // return response()->json(array("data" => $categorias, "code" => 200, "msj" => ''));
        // return response()->json(array("data" => $categorias, "code" => 500, "msj" => ''),500); // error 
    }

    public function todas()
    {
        $categorias = Categoria::all();

        $data = [
            "categorias" => $categorias,
        ];

        return $this->successResponse($data);

    }

    public function listaFiltros(Categoria $categoria)
    {
        try{
            $colors = Tipo::where('id_categoria_tipo',1)->get();
            $chapas = Tipo::where('id_categoria_tipo',2)->get();
            $puertas = Tipo::where('id_categoria_tipo',3)->get();
            $cuerpos = Tipo::where('id_categoria_tipo',4)->get();

            $row = new \stdClass();

            
            $row->colors = $colors;
            $row->chapas = $chapas;
            $row->puertas = $puertas;
            $row->cuerpos = $cuerpos;

            $response[] = $row;

            $data = [
                "filtros" => $response,
            ];

            // dd($data);

            return $this->successResponse($data);
        }
        catch(ModelNotFoundException $exception){
            // dd($exception);
            return $this->errorResponse('Error');
        }
        catch(\Exception $exception)
        {
            // dd($exception);
            return $this->errorResponse('Error2');
        }
    }

    public function categorias($id, Categoria $categoria)

    {
        try{
            $categoria = $categoria->where('slug',$id)->firstOrFail();

            $data = [
                "categoria" => $categoria,
                "productos" => $categoria->productos_relacionados()->paginate(2)
            ];

            return $this->successResponse($data);
        }
        catch(ModelNotFoundException $exception){
            // dd($exception);
            return $this->errorResponse('Error');
        }
        catch(\Exception $exception)
        {
            return $this->errorResponse('Error2');
        }
        
    }

    public function productos(Request $request, Categoria $categoria)
    {

        try{

            // Analizamos si hay filtros

            $categoria = $categoria->where('slug',$request["slug"])->firstOrFail();

            $productos = Producto::where('id_categoria',$categoria->id)->where('activo',1);

            if (!empty($request["colores"])){

                $arrayTipo = explode(',',$request["colores"]);
                
                $productos = $productos->whereHas('tiposMuchos',function($query) use ($arrayTipo){
                        $query->where(function($queryB) use ($arrayTipo){
                            foreach ($arrayTipo as $key => $tipo_id) {
                                $queryB->orWhere('id_tipo', $tipo_id);
                            }
                        });
                });

            }

            if (!empty($request["chapas"])){

                $arrayTipo = explode(',',$request["chapas"]);
                $productos = $productos->whereHas('tiposMuchos',function($query) use ($arrayTipo){
                    $query->where(function($queryB) use ($arrayTipo){
                        foreach ($arrayTipo as $key => $tipo_id) {
                            $queryB->orWhere('id_tipo', $tipo_id);
                        }
                    });
                });
            }

            if (!empty($request["cuerpos"])){

                $arrayTipo = explode(',',$request["cuerpos"]);
                $productos = $productos->whereHas('tiposMuchos',function($query) use ($arrayTipo){
                    $query->where(function($queryB) use ($arrayTipo){
                        foreach ($arrayTipo as $key => $tipo_id) {
                            $queryB->orWhere('id_tipo', $tipo_id);
                        }
                    });
                });
            }

            if (!empty($request["puertas"])){

                $arrayTipo = explode(',',$request["puertas"]);
                $productos = $productos->whereHas('tiposMuchos',function($query) use ($arrayTipo){
                    $query->where(function($queryB) use ($arrayTipo){
                        foreach ($arrayTipo as $key => $tipo_id) {
                            $queryB->orWhere('id_tipo', $tipo_id);
                        }
                    });
                });
            }

            // dd($productos->toSql());

            $productos = $productos->orderBy('nombre', 'ASC')->paginate(1000);

            // dd(count($productos));
            
            $response = [];

            foreach ($productos as $producto)
            {
                $miProduco = Producto::find($producto->id);

                $row = new \stdClass();

                $row->data = $producto;
                $galerias = $miProduco->galeriaMuchos()->get();

                foreach ($galerias as $galeria )
                {
                    if ($galeria->default == 1){
                        $row->imagen = $galeria->foto;
                        break;
                    }
                }

                $response[] = $row;

            }

            $data = [
                "response" => $response,
                "productos" => $productos
            ];

            return $this->successResponse($data);
        }
        catch(ModelNotFoundException $exception){
            // dd($exception);
            return $this->errorResponse('Error');
        }
        catch(\Exception $exception)
        {
            return $this->errorResponse('Error2');
        }
    }

    public function buscar(Request $request, Categoria $categoria)
    {

        try{

            // Analizamos si hay filtros
            // dd($request["slug"]);
            $categoria = $categoria->where('slug',$request["slug"])->firstOrFail();

            $productos = Producto::where('id_categoria',$categoria->id)->where('activo',1)->where('nombre','like','%'.$request["buscar"].'%');

            

            // dd($productos->toSql());

            $productos = $productos->orderBy('nombre', 'ASC')->paginate(1000);

            // dd(count($productos));
            
            $response = [];

            foreach ($productos as $producto)
            {
                $miProduco = Producto::find($producto->id);

                $row = new \stdClass();

                $row->data = $producto;
                $galerias = $miProduco->galeriaMuchos()->get();

                foreach ($galerias as $galeria )
                {
                    if ($galeria->default == 1){
                        $row->imagen = $galeria->foto;
                        break;
                    }
                }

                $response[] = $row;

            }

            $data = [
                "response" => $response,
                "productos" => $productos
            ];

            return $this->successResponse($data);
        }
        catch(ModelNotFoundException $exception){
            // dd($exception);
            return $this->errorResponse('Error');
        }
        catch(\Exception $exception)
        {
            return $this->errorResponse('Error2');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
