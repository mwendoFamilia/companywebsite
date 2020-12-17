<div>
    <x-jet-label for="first_name" value="{{ __('First Name') }}" />
    <x-jet-input id="first_name" class="block w-full mt-1" type="text" name="first_name" :value="old('first_name')"
        required autofocus autocomplete="first_name" />
</div>
<div>
    <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
    <x-jet-input id="last_name" class="block w-full mt-1" type="text" name="last_name" :value="old('last_name')"
        required autocomplete="last_name" />
</div>
