<x-laravel-admin::wrapper>
    <x-slot name="title">
            {{ __($title) }}
    </x-slot>

    <div class="flex w-full flex-col">
        <div class="py-2">
            <div class="divider divider-primary">Login Form</div>
            <div class="card place-items-center py-10">
                <div class="card bg-base-100 w-96 shadow-xl">
                    <div class="card-body">
                    {!! form($loginForm = $formBuilder->create(\BalajiDharma\LaravelAdmin\Forms\Admin\Demo\LoginForm::class, [
                        'method' => 'POST',
                        'url' => route('admin.demo.forms.store'),
                    ])) !!}
                    </div>
                </div>
            </div>

            <details class="collapse collapse-arrow bg-base-200">
                <summary class="collapse-title text-xl font-medium">Code</summary>
                <div class="collapse-content">
                    @include('laravel-admin::demo.forms._highlight_class', ['class' => \BalajiDharma\LaravelAdmin\Forms\Admin\Demo\LoginForm::class])
                </div>
            </details>
        </div>

        <div class="py-2">
            <div class="divider divider-primary">Registration Form</div>
            <div class="card place-items-center py-10">
                <div class="card bg-base-100 w-96 shadow-xl">
                    <div class="card-body">
                    {!! form($loginForm = $formBuilder->create(\BalajiDharma\LaravelAdmin\Forms\Admin\Demo\RegistrationForm::class, [
                        'method' => 'POST',
                        'url' => route('admin.demo.forms.store'),
                    ])) !!}
                    </div>
                </div>
            </div>

            <details class="collapse collapse-arrow bg-base-200">
                <summary class="collapse-title text-xl font-medium">Code</summary>
                <div class="collapse-content">
                @include('laravel-admin::demo.forms._highlight_class', ['class' => \BalajiDharma\LaravelAdmin\Forms\Admin\Demo\RegistrationForm::class])
                </div>
            </details>
        </div>

        <div class="py-2">
            <div class="divider divider-primary">Shipping Address Form</div>
            <div class="card place-items-center py-10">
                <div class="card bg-base-100 w-2/3 shadow-xl">
                    <div class="card-body">
                    {!! form($loginForm = $formBuilder->create(\BalajiDharma\LaravelAdmin\Forms\Admin\Demo\ShippingAddressForm::class, [
                        'method' => 'POST',
                        'url' => route('admin.demo.forms.store'),
                    ])) !!}
                    </div>
                </div>
            </div>

            <details class="collapse collapse-arrow bg-base-200">
                <summary class="collapse-title text-xl font-medium">Code</summary>
                <div class="collapse-content">
                @include('laravel-admin::demo.forms._highlight_class', ['class' => \BalajiDharma\LaravelAdmin\Forms\Admin\Demo\ShippingAddressForm::class])
                </div>
            </details>
        </div>
    </div>
</x-laravel-admin::wrapper>