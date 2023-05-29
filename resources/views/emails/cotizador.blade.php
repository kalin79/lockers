<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="widtr=device-widtr, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     <style>
          body{
               color: blue;
          }
     </style>
</head>
<body>

     <div style="background:#63afc8; padding: .5rem">
          <h2 style="font-size: 16px; font-family:'Tahoma'; line-height:1.25em;color:#fff"><strong>Datos del Producto</strong></h2>
     </div>
     <table>
          <tr>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e"><strong>Producto para Cotizar:</strong></p>
               </td>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e">{{ $data["nombre"] }}</p>
               </td>
          </tr>
          <tr>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e"><strong>Cantidad:</strong></p>
               </td>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e">{{ $data["cantidad"] }}</p>
               </td>
          </tr>
     </table>

     <div style="background:#63afc8; padding: .5rem">
          <h2 style="font-size: 16px; font-family:'Tahoma'; line-height:1.25em;color:#fff"><strong>Datos del Cliente:</strong></h2>
     </div>
     <table>
          <tr>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e"><strong>Nombres y Apellidos</strong></p>
               </td>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e">{{ $data["cliente"] }}</p>
               </td>
          </tr>
          <tr>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e"><strong>RUC / DNI:</strong></p>
               </td>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e">{{ $data["dni"] }}</p>
               </td>
          </tr>
          <tr>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e"><strong>N&uacute;mero de celular:</strong></p>
               </td>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e">{{ $data["celular"] }}</p>
               </td>
          </tr>
          <tr>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e"><strong>Correo Electr&oacute;nico:</strong></p>
               </td>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e">{{ $data["email"] }}</p>
               </td>
          </tr>
          <tr>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e"><strong>Descripci&oacute;n del Proyecto:</strong></p>
               </td>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e">{{ $data["descripcion"] }}</p>
               </td>
          </tr>
          <tr>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e"><strong>T&eacute;rminos y Condiciones:</strong></p>
               </td>
               <td>
                    <p style="font-size: 14px; font-family:'Tahoma'; line-height:1.5em;color:#3e3e3e">{{  $data["flat_agree"] == 1 ? 'SI' : 'NO' }}</p>
               </td>
          </tr>
     </table>
</body>
</html>