@extends('layouts.app')

@section('tablas')
  <div class="nomodal top-0">
    <div class="modal-content animate-zoom">
      <div class= "text-center mb-4">
        <svg width="358px" height="107px" viewBox="0 0 512 152">
          <g id="form_top">
            <rect id="fondo" fill="#363636" width="512" height="152"/>
            <path id="mesa_az" fill="#00ABD6" d="M124 94l65 0 0 38 -65 0 0 -38zm184 0l64 0 0 38 -64 0 0 -38zm-92 0l65 0 0 38 -65 0 0 -38z"/>
            <path id="mesa_tur" fill="#00F7FF" d="M216 28l65 0 0 38 -65 0 0 -38zm92 0l64 0 0 38 -64 0 0 -38z"/>
            <path id="mesa_am" fill="#FFEE00" d="M400 28l64 0 0 38 -64 0 0 -38zm-276 0l65 0 0 38 -65 0 0 -38zm-91 66l64 0 0 38 -64 0 0 -38z"/>
            <path id="flecha" fill="#FF0066" d="M168 52l51 30 -19 7 18 27c0,1 0,3 -1,4l-7 4c-1,1 -3,0 -4,-1l-17 -27 -15 15 -6 -59z"/>
          </g>
        </svg>
      </div>
      <div class="form-header px-6 caja-header text-center">
        <h3 class="form-title">@yield('form-title')></h3>
      </div>
      <div class="form-body">@yield('form-content')</div>

      <div class="px-6 py-4 mt-6 light-grey">
        <a href="/" title="Volver a la página anterior" class="d_inline boton danger">Cancelar</a>
      </div>
    </div>
  </div>

{{-- 
<div class="modal-dialog" role="document">
    esto es una prueba
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">@yield('title')</h5>
        </div>
        <div class="modal-body">@yield('content')</div>
        <div class="modal-footer">@yield('footer')</div>
    </div>
</div> --}}