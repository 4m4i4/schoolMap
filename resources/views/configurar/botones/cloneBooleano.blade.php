{{-- botones.createBooleano --}}
{{-- @extends('layouts.app')

@section('tablas')
<div class="nomodal">
  @include('include.formBanner')
    <div class="px-6 caja-header text-center">
      <h3 class="form-title">Personalizar Booleano
      </h3>
    </div> --}}
  @php
    use App\Models\Boton;
    $plantilla = Boton::find(1);
  @endphp
  <details>
    <summary>Formulario</summary>
    <form class="mx-2" method="POST" action="{{ route('botones.store') }}">
      @csrf
        <input type="hidden" name="user_id" value={{ auth()->user()->id }}/>
        <input type="hidden" name="default" value= 0 />
        <input type="hidden" name="v_last" value= 1 />
        <input type="hidden" name="pasos" value= 2 />
        <input type="hidden" name="tipoBt_id" value=1 />
        <label class= "d_block mt-2" for="bt_name"><strong>Nombre del botón</strong></label>
        <input  class="d_block" type="text" name="bt_name" value="{{ $plantilla->bt_name }}" />
        @error('bt_name')
            <small class="t_red">* {{ $message }}</small><br>
        @enderror

        <label class= "d_block mt-2" for="descripcion"><strong>Descripción</strong></label>
        <input class="d_block" type="text" name="descripcion" value="{{ $plantilla->descripcion }}" />
        @error('descripcion')
            <small class="t_red">* {{ $message }}</small><br>
        @enderror
        <label class= "d_block mt-2" for="items"><strong>Valores</strong></label>
        <input class="d_block"  type="text" name="items" value="{{ $plantilla->items }}"" />
        @error('valores')
            <small class="t_red">* {{ $message }}</small><br>
        @enderror

      {{-- </div> --}}
      <div>
        <button type="submit" 
            title="clonar booleano" 
            class="bt_xxl mt-6 default">Guardar</button>
        </div>
    </form>
    </details>

    {{-- <div class="px-6 py-4 mt-6 light-grey">
      <a href="/personalizar"  title="Cancelar y volver a la página de personalización"
      class="cancelar">Cancelar</a>
    </div> --}}
{{-- </div> --}}
  
{{-- @endsection --}}