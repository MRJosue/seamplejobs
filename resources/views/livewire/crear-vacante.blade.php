<form  class="md:w-1/2 space-y-5" wire:submit.prevent = 'CrearVacante'>

        <div>
            <x-input-label for="titulo" :value="__('Titulo')" />
            <x-text-input 
            id="titulo" 
            wire:model='titulo'
            class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')"/>
            
            @error('titulo')
                <livewire:mostrar-alerta :message="$message" />
            @enderror

        </div>

    
        <div>
            <x-input-label for="salario" :value="__('Salario')" />
            <select id="salario" name="salario" wire:model='salario' class="rounded-md font-bold uppercase text-sm text-gray-500 dark:text-gray-300 mb-2 block mt-1 w-full" >
                <option value="">-- Selecciona un Salario</option>

                @foreach ($salarios as $salario)
                    <option value="{{$salario->id}}">{{$salario->salario}}</option>
                @endforeach

            </select>
            <x-input-error :messages="$errors->get('salario')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="categoria" :value="__('Categoria')" />
            <select id="categoria" name="categoria" wire:model='categoria' class="rounded-md font-bold uppercase text-sm text-gray-500 dark:text-gray-300 mb-2 block mt-1 w-full" >
                <option value="">-- Selecciona una Categoria</option>

                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                @endforeach

            </select>
            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="empresa" :value="__('Empresa')" />
            <x-text-input id="empresa" wire:model='empresa' placeholder="Empresa: ej. Netflix, Uber, Coca cola" class="block mt-1 w-full" type="text" name="empresa" :value="old('empresa')"  />
            <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
        </div>


        <div>
            <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />
            <x-text-input id="ultimo_dia" wire:model='ultimo_dia' class="block mt-1 w-full" type="date" name="ultimo_dia" :value="old('ultimo_dia')"  />
            <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
        </div>



        <div>
            <x-input-label for="descripcion" :value="__('Descripcion Puesto')" />
            <textarea id="descripcion" wire:model='descripcion' name = "descripcion" placeholder="Descripcion general del puesto."   
            class="rounded-md font-bold uppercase text-sm text-gray-500 dark:text-gray-300 mb-2 block mt-1 w-full h-72" >
            </textarea>
            
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="imagen" :value="__('Imagen')" />

            
            <x-text-input id="imagen"  accept="image/*" wire:model='imagen' class="block mt-1 w-full" type="file" name="imagen" />
            
            {{--preview two way data binding--}}
           <div class="my-5 w-80">
                @if ($imagen)
                    Imagen:
                    <img src="{{$imagen->temporaryUrl()}}" alt="">
                @endif
           </div>
            <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
            
        </div>


        <div class="mt-4">
            <x-primary-button class="w-full justify-center">
                {{ __('Crear vacante') }}
            </x-primary-button>
        </div>
</form>