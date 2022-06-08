<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Tipo;
use App\Models\ProductoRelacionado;
use Illuminate\Http\Request;

// use App\Jobs\SendEmail;

use App\Mail\EmailCotizador;
use Illuminate\Support\Facades\Mail;

// para mis validaciones de respuesta con Api Rest con Json 

use App\Traits\ApiResponse;

class ProductoController extends Controller
{
    use ApiResponse;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function contacto(Request $request)
    {
        try{
            // $send = SendEmail::dispatch('carlos.espinoza24g@gmail.com','Hola mundo');
            $email = ['c.augusto.espinoza@gmail.com','ventas@lockersplus.com.pe'];
            $send = Mail::to($email)->send(new EmailCotizador($request,1));
            
            $data = [
                "send" => $send,
            ];
            return $this->successResponse($data);
        }
        catch(ModelNotFoundException $exception){
            // dd($exception);
            return $this->errorResponse($exception);
        }
        catch(\Exception $exception)
        {
            return $this->errorResponse($exception);
        }

    }
    
    public function cotizar(Request $request)
    {
        // Enviado por colas
        // SendEmail::dispatch('carlos.espinoza24@gmail.com','Hola mundo');

        // de manera tradicional
        // dd($request["nombre"]);
        try{
            // $send = SendEmail::dispatch('carlos.espinoza24g@gmail.com','Hola mundo');
            $email = ['c.augusto.espinoza@gmail.com','ventas@lockersplus.com.pe'];
            $send = Mail::to($email)->send(new EmailCotizador($request,2));
            
            $data = [
                "send" => $send,
            ];
            return $this->successResponse($data);
        }
        catch(ModelNotFoundException $exception){
            // dd($exception);
            return $this->errorResponse($exception);
        }
        catch(\Exception $exception)
        {
            return $this->errorResponse($exception);
        }

    }

    public function detalle($id)
    {
        try{

            $producto = Producto::where('slug',$id)->firstOrFail();
            
            

            $producto_relacionados = ProductoRelacionado::where('id_producto',$producto->id)->where('estado',1)->get();

            $response = [];

            foreach ($producto_relacionados as $relacionados)
            {
                $misRelacionados = Producto::find($relacionados->id_producto_relacionado);

                $row = new \stdClass();

                $row->data = $misRelacionados;

                $galerias = $misRelacionados->galeriaMuchos()->get();

                foreach ($galerias as $galeria )
                {
                    if ($galeria->default == 1){
                        $row->imagen = $galeria->foto;
                        break;
                    }
                }

                $response[] = $row;
            }

            // Vamos a obtener los tipos

            $misTipos = $producto->tiposMuchos()->get();
            
            // Guardamos todos los colores
            $responseColor = [];

            $colors = Tipo::where('id_categoria_tipo',1)->get();
            $chapas = Tipo::where('id_categoria_tipo',2)->get();
            $puertas = Tipo::where('id_categoria_tipo',3)->get();
            $cuerpos = Tipo::where('id_categoria_tipo',4)->get();

            $row2 = new \stdClass();

            foreach ($misTipos as $tipo )
            {
                foreach ($colors as $color )
                {
                    if ($color->id == $tipo->id_tipo){
                        $row2 = $color;
                        $responseColor[] = $row2;
                    }
                }
                
            }

            // Guardamos todos los chapas
            $row3 = new \stdClass();
            $responseChapas = [];

            foreach ($misTipos as $tipo )
            {
                foreach ($chapas as $chapa )
                {
                    if ($chapa->id == $tipo->id_tipo){
                        $row3 = $chapa;
                        $responseChapas[] = $row3;
                    }
                }
                
            }

            // Guardamos todos los puertas
            $row4 = new \stdClass();
            $responsePuertas = [];

            foreach ($misTipos as $tipo )
            {
                foreach ($puertas as $puerta )
                {
                    if ($puerta->id == $tipo->id_tipo){
                        $row4 = $puerta;
                        $responsePuertas[] = $row4;
                    }
                }
                
            }

            // Guardamos todos los cuerpos
            $row5 = new \stdClass();
            $responseCuerpos = [];

            foreach ($misTipos as $tipo )
            {
                foreach ($cuerpos as $cuerpo )
                {
                    if ($cuerpo->id == $tipo->id_tipo){
                        $row5 = $cuerpo;
                        $responseCuerpos[] = $row5;
                    }
                }
                
            }



            $data = [
                "producto" => $producto,
                "categoria" => $producto->categoria()->get(),
                "complementarios" => $response,
                "colores" => $responseColor,
                "chapas" => $responseChapas,
                "puertas" => $responsePuertas,
                "cuerpos" => $responseCuerpos,
                "galerias" => $producto->galeriaMuchos()->get(),
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
    public function edit(Producto $producto)
    {
        //
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
        //
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
