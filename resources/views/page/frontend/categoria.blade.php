@extends('layouts.frontend.master')
@section('meta_tags')
    <title>Lockers + Plus</title>
    <meta name="title" content="Lockers + Plus"  />
    <meta name="description" content=" Optimice su espacio y ofrezca seguridad para  documentos, artículos de trabajo u objetos personales" />
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Lockers + Plus" >
    <meta itemprop="description" content=" Optimice su espacio y ofrezca seguridad para  documentos, artículos de trabajo u objetos personales">
    <meta itemprop="image" content="https://locker.codegraph.pe/frontend/images/share.png">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="Lockers + Plus" >
    <meta name="twitter:description" content=" Optimice su espacio y ofrezca seguridad para  documentos, artículos de trabajo u objetos personales">
    <meta name="twitter:creator" content="@author_handle">
    <!-- Twitter Summary card images must be at least 120x120px  -->
    <meta name="twitter:image" content="https://locker.codegraph.pe/frontend/images/share.png">

    <!-- Open Graph data -->
    <meta property="og:title" content="Lockers + Plus"  />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://zoologicoamigable.com" />
    <meta property="og:image" content="https://locker.codegraph.pe/frontend/images/share.png" />
    <meta property="og:description" content=" Optimice su espacio y ofrezca seguridad para  documentos, artículos de trabajo u objetos personales" />
    <meta property="og:site_name" content="https://zoologicoamigable.com/, Lima Perú" />
    <meta property="article:published_time" content="2023-09-17T05:59:00+01:00" />
    <meta property="article:modified_time" content="2023-09-16T19:08:47+01:00" />
    <meta property="article:section" content="Article Section" />
    <meta property="article:tag" content="Article Tag" />
    <meta property="fb:admins" content="Facebook numberic ID" />
     
@endsection
@section('content')
    <categoria-main slug="{!! $id !!}"></categoria-main>
@endsection