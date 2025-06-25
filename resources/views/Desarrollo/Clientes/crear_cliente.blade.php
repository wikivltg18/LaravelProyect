@extends('Desarrollo.layout_desarrollo')

@section('template-blank-development')
    @push('CSS')
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/switchery/switchery.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/jquery-steps/jquery.steps.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">

        <style>
            .btn-primary {
                background-color: #15baee !important;
                border-color: #15baee !important;
                color: white !important;
                font-weight: bolder !important;
            }

            .btn-primary:hover {
                background-color: #004EA4 !important;
                border-color: #004EA4 !important;
            }

            .btn-outline-success:hover,
            .btn-outline-success:active {
                color: #fff !important;
                background-color: #15baee !important;
                border-color: #15baee !important;
            }

            .btn-outline-success {
                border-color: #15baee !important;
            }

            .mt-6 {
                margin-top: 6rem;
            }

            .mt-7 {
                margin-top: 7rem;
            }

            .mt-8 {
                margin-top: 8rem;
            }

            .mt-9 {
                margin-top: 9rem;
            }

            .mt-10 {
                margin-top: 10rem;
            }

            .mt-11 {
                margin-top: 11rem;
            }

            .mt-12 {
                margin-top: 12rem;
            }

            .mt-13 {
                margin-top: 13rem;
            }

            .mt-14 {
                margin-top: 14rem;
            }

            .mt-15 {
                margin-top: 15rem;
            }


            .form-control-warning {
                /* Estilo consistente para errores */
                border-color: #dc3545;
            }

            .error-message {
                /* Estilo para los mensajes de error */
                color: #dc3545;
                font-size: 0.8rem;
                margin-top: 0.25rem;
            }

            /* Estilo adicional para el wizard como en la imagen */
            .steps ul {
                display: flex;
                justify-content: center;
            }

            .steps li {
                flex: 1;
                max-width: 200px;
            }

            .steps .current .step {
                background-color: #0d6efd;
                color: white;
            }

            .steps .done .step {
                background-color: #0d6efd;
                color: white;
            }
        </style>
    @endpush

    @section('button-press')
        <a href="{{ route('Clientes')}}" class="btn btn-primary">Listado de clientes</a>
    @endsection

    <form action="{{ route('store.cliente') }}" method="POST" enctype="multipart/form-data">
        @csrf {{-- Protección contra CSRF --}}
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lg_cliente">Logo del cliente</label>
                            <input type="file" name="lg_cliente" id="logo_cliente" class="form-control @error('lg_cliente') form-control-warning @enderror">
                            <small class="text-muted"> Foto de referencia del cliente. </small>
                            @error('lg_cliente')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre_cliente">Nombre del cliente <span class="text-danger">*</span></label>
                            <input type="text" name="nm_cliente" class="form-control @error('nm_cliente') form-control-warning @enderror" required>
                            <small class="text-muted"> Eje: Unicentro, Manitoba, Comfandi. </small>
                            @error('nm_cliente')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email_cliente">Email <span class="text-danger">*</span></label>
                            <input type="email" name="em_cliente" id="email_cliente"
                                class="form-control @error('em_cliente') form-control-warning @enderror" required>
                            <small class="text-muted"> Eje: Manitoba@gmail.com, Comfandi@gmail.com. </small>
                            @error('em_cliente')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefono_cliente">Teléfono <span class="text-danger"> * </span></label>
                            <input type="text" name="telefono_cliente" id="telefono_cliente"
                                class="form-control @error('telefono_cliente') form-control-warning @enderror" required>
                            <small class="text-muted"> Telefono de comunicación directo del cliente. </small>

                            @error('telefono_cliente')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefono_referencia_cliente">Teléfono referencia <span class="text-danger">
                                    * </span></label>
                            <input type="text" name="telefono_referencia_cliente" id="telefono_referencia_cliente"
                                class="form-control @error('telefono_referencia_cliente') form-control-warning @enderror"
                                required>
                            <small class="text-muted"> Telefono de referencia del cliente. </small>
                            @error('telefono_referencia_cliente')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sitio_web_cliente">Sitio web <span class="text-danger">*</span></label>
                            <input type="text" name="st_web" class="form-control @error('st_web') form-control-warning @enderror" required>
                            <small class="text-muted"> Url del sitio web del cliente.</small>
                            @error('st_web')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mapa_cliente">Mapa cliente</label>
                            <input type="file" name="mapa_cliente" id="mapa_cliente"
                                class="form-control @error('mapa_cliente') form-control-warning @enderror">
                            <small class="text-muted"> Agregar el mapa de cliente en formato excel. </small>
                            @error('mapa_cliente')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="usuario_id">Ejecutivo de cuenta <span class="text-danger"> * </span></label>
                            <select name="usuario_id" id="usuario_id"
                                class="form-control @error('usuario_id') form-control-warning @enderror">
                                <option value="">Seleccione un ejecutivo</option>
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}"> {{ $usuario->nombre }} </option>
                                @endforeach
                            </select>
                            <small class="text-muted"> Elegir el ejecutivo que se encargara del cliente. </small>
                            @error('usuario_id')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contratos">Contrato <span class="text-danger"> * </span></label>
                            <select class="selectpicker form-control @error('contratos') form-control-warning @enderror"
                                data-size="5" data-style="btn-outline-success" data-selected-text-format="count"
                                multiple name="contratos[]" id="contratos">
                                @foreach ($contratos as $contrato)
                                    <option value="{{ $contrato->id }}"> {{ $contrato->nombre }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted"> Escoger el tipo de contratos asociados al cliente. </small>
                            @error('contratos')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="servicio_id">Servicios <span class="text-danger"> * </span></label>
                            <select name="servicio_id" id="servicio_id"
                                class="form-control @error('servicio_id') form-control-warning @enderror">
                                <option value="">Seleccione un servicio</option>
                                @foreach ($servicios as $servicio)
                                    <option value="{{ $servicio->id }}"> {{ $servicio->nombre }} </option>
                                @endforeach
                            </select>
                            <small class="text-muted"> Seleccione el servicio que se encargara del cliente. </small>
                            @error('servicio_id')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="servicios_relacionados">Tipo servicio asociado <spanclass="text-danger">*</span></label>
                                    <select id="servicios_relacionados" name="servicios_relacionados[]" multiple>

                                    </select>
                            <small class="text-muted">Cree los servicios relacionados con el cliente.</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="servicios_relacionados">Fee<span class="text-danger">*</span> </label>
                                    <select  name="recurrencia" class="form-control @error('fe_cliente') form-control-warning @enderror" name="fe_cliente">
                                        <option value="">seleccione la recurrencia</option>
                                        <option value=1>Si</option>
                                        <option value=0>No</option>
                                    </select>
                            <small class="text-muted">Cree los servicios relacionados con el cliente.</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="url_instagram">Link Instagram </label>
                                    <input type="text" name="url_instagram" id="url_instagram"
                                        class="form-control @error('url_instagram') form-control-warning @enderror"
                                        required>
                                    <small class="text-muted"> Eje: https://www.instagram.com </small>
                                    @error('url_instagram')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="url_facebook">Link Facebook </label>
                                    <input type="text" name="url_facebook" id="url_facebook"
                                        class="form-control @error('url_facebook') form-control-warning @enderror"
                                        required>
                                    <small class="text-muted"> Eje: https://www.facebook.com </small>
                                    @error('url_facebook')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="url_youtube">Link Youtube </label>
                                    <input type="text" name="url_youtube" id="url_youtube"
                                        class="form-control @error('url_youtube') form-control-warning @enderror"
                                        required>
                                    <small class="text-muted"> Eje: https://www.youtube.com</small>
                                    @error('url_youtube')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-12">Siguiente</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-5 text-center" style="background-color: #004EA4; height: 853px !important; ">
                    <img src="{{ asset('vendors/images/Logo_Himalaya_blanco-10.png') }}" alt="logo_himalaya"
                        class="mt-15">
                </div>
            </div>
        </div>






        @push('JS')
            <script src="{{ asset('vendors/scripts/core.js') }}"></script>
            <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
            <script src="{{ asset('vendors/scripts/process.js') }}"></script>
            <script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
            <script src="{{ asset('src/plugins/switchery/switchery.min.js') }}"></script>
            <script src="{{ asset('src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
            <script src="{{ asset('src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
            <script src="{{ asset('vendors/scripts/advanced-components.js') }}"></script>
            <script src="{{ asset('src/plugins/jquery-steps/jquery.steps.js') }}"></script>
            <script>
                $(document).ready(function() {
                    // Inicializa bootstrap-tagsinput con las opciones itemValue y itemText
                    $('#servicios_relacionados').tagsinput({
                        itemValue: 'value', // La propiedad del objeto que contiene el valor
                        itemText: 'text' // La propiedad del objeto que contiene el texto visible
                    });

                    // Cuando cambie el selector de servicios
                    $('#servicio_id').on('change', function() {
                        var servicioId = $(this).val();

                        if (servicioId) {
                            $.ajax({
                                url: "{{ route('obtener.servicios.relacionados', ['id' => ':id']) }}"
                                    .replace(':id', servicioId),
                                type: 'GET',
                                dataType: 'json',
                                success: function(data) {
                                    // Limpiar el tagsinput
                                    $('#servicios_relacionados').tagsinput('removeAll');

                                    // Agregar los nuevos servicios relacionados
                                    $.each(data, function(key, value) {
                                        $('#servicios_relacionados').tagsinput('add',
                                        value); // Ahora 'value' ya es un objeto con 'value' y 'text'
                                    });
                                }
                            });
                        } else {
                            // Si no hay servicio seleccionado, limpiar el campo
                            $('#servicios_relacionados').tagsinput('removeAll');
                        }
                    });
                });
            </script>
        @endpush
    @endsection
