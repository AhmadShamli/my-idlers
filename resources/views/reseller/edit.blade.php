@section('title') {{$reseller[0]->main_domain}} {{'edit'}} @endsection
<x-app-layout>
    <x-slot name="header">
        Edit {{ $reseller[0]->main_domain }}
    </x-slot>

    <div class="container">
        <div class="card mt-3 shadow">
            <div class="card-body">
                <a href="{{ route('reseller.index') }}"
                   class="btn btn-primary px-4 py-1">
                    Back to reseller hosting
                </a>
                <x-auth-validation-errors></x-auth-validation-errors>
                <form action="{{ route('reseller.update', $reseller[0]->service_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mt-3">
                        <div class="col-12 col-lg-3 mb-4">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Domain</span></div>
                                <input type="text"
                                       class="form-control"
                                       name="domain" value="{{$reseller[0]->main_domain}}">
                                @error('name') <span class="text-red-500">{{ $message }}
                    </span>@enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 mb-4">
                            <input type="hidden" name="id" value="{{$reseller[0]->service_id}}">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Type</span></div>
                                <select class="form-control" name="reseller_type">
                                    <option
                                        value="ApisCP" {{ ($reseller[0]->reseller_type === 'ApisCP') ? 'selected' : '' }}>
                                        ApisCP
                                    </option>
                                    <option
                                        value="Centos" {{ ($reseller[0]->reseller_type === 'Centos') ? 'selected' : '' }}>
                                        Centos
                                    </option>
                                    <option
                                        value="cPanel" {{ ($reseller[0]->reseller_type === 'cPanel') ? 'selected' : '' }}>
                                        cPanel
                                    </option>
                                    <option
                                        value="Direct Admin" {{ ($reseller[0]->reseller_type === 'Direct Admin') ? 'selected' : '' }}>
                                        Direct Admin
                                    </option>
                                    <option
                                        value="Webmin" {{ ($reseller[0]->reseller_type === 'Webmin') ? 'selected' : '' }}>
                                        Webmin
                                    </option>
                                    <option
                                        value="Moss" {{ ($reseller[0]->reseller_type === 'Moss') ? 'selected' : '' }}>
                                        Moss
                                    </option>
                                    <option
                                        value="Other" {{ ($reseller[0]->reseller_type === 'Other') ? 'selected' : '' }}>
                                        Other
                                    </option>
                                    <option
                                        value="Plesk" {{ ($reseller[0]->reseller_type === 'Plesk') ? 'selected' : '' }}>
                                        Plesk
                                    </option>
                                    <option
                                        value="Run cloud" {{ ($reseller[0]->reseller_type === 'Run cloud') ? 'selected' : '' }}>
                                        Run cloud
                                    </option>
                                    <option
                                        value="Vesta CP" {{ ($reseller[0]->reseller_type === 'Vesta CP') ? 'selected' : '' }}>
                                        Vesta CP
                                    </option>
                                    <option
                                        value="Virtual min" {{ ($reseller[0]->reseller_type === 'Virtual min') ? 'selected' : '' }}>
                                        Virtual min
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Dedicated IP</span>
                                </div>
                                <input type="text" name="dedicated_ip" class="form-control" value="
@if(isset($ip_address[0]['address']))
                                {{$ip_address[0]['address']}}@endif">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Provider</span></div>
                                <select class="form-control" name="provider_id">
                                    <option value="0">Select provider</option>
                                    @foreach ($providers as $pr)
                                        <option
                                            value="{{ $pr['id'] }}" {{ ( $pr['id'] === $reseller[0]->provider_id) ? 'selected' : '' }}> {{ $pr['name'] }} </option>
                                    @endforeach
                                </select></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Price</span></div>
                                <input type="number" id="price" name="price" class="form-control" min="0" max="999"
                                       step="0.01" required="" value="{{ $reseller[0]->price }}"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Term</span></div>
                                <select class="form-control" id="payment_term" name="payment_term">
                                    <option value="1" {{ ($reseller[0]->term === 1) ? 'selected' : '' }}>Monthly
                                    </option>
                                    <option value="2" {{ ($reseller[0]->term === 2) ? 'selected' : '' }}>Quarterly
                                    </option>
                                    <option value="3" {{ ($reseller[0]->term === 3) ? 'selected' : '' }}>Half annual
                                        (half
                                        year)
                                    </option>
                                    <option value="4" {{ ($reseller[0]->term === 4) ? 'selected' : '' }}>Annual (yearly)
                                    </option>
                                    <option value="5" {{ ($reseller[0]->term === 5) ? 'selected' : '' }}>Biennial (2
                                        years)
                                    </option>
                                    <option value="6" {{ ($reseller[0]->term === 6) ? 'selected' : '' }}>Triennial (3
                                        years)
                                    </option>
                                </select></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Currency</span></div>
                                <select class="form-control" id="currency" name="currency">
                                    <option value="AUD" {{ ($reseller[0]->currency === 'AUD') ? 'selected' : '' }}>AUD
                                    </option>
                                    <option value="USD" {{ ($reseller[0]->currency === 'USD') ? 'selected' : '' }}>USD
                                    </option>
                                    <option value="GBP" {{ ($reseller[0]->currency === 'GBP') ? 'selected' : '' }}>GBP
                                    </option>
                                    <option value="EUR" {{ ($reseller[0]->currency === 'EUR') ? 'selected' : '' }}>EUR
                                    </option>
                                    <option value="NZD" {{ ($reseller[0]->currency === 'NZD') ? 'selected' : '' }}>NZD
                                    </option>
                                    <option value="JPY" {{ ($reseller[0]->currency === 'JPY') ? 'selected' : '' }}>JPY
                                    </option>
                                    <option value="CAD" {{ ($reseller[0]->currency === 'CAD') ? 'selected' : '' }}>CAD
                                    </option>
                                </select></div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 col-md-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Location</span>
                                </div>
                                <select class="form-control" name="location_id">
                                    <option value="999">Null</option>
                                    @foreach ($locations as $loc)
                                        <option
                                            value="{{ $loc->id }}" {{ ( $loc->id === $reseller[0]->provider_id) ? 'selected' : '' }}> {{ $loc  ->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Was promo</span></div>
                                <select class="form-control" name="was_promo">
                                    <option value="0" {{ ($reseller[0]->was_promo === 0) ? 'selected' : '' }}>No
                                    </option>
                                    <option value="1" {{ ($reseller[0]->was_promo === 1) ? 'selected' : '' }}>Yes
                                    </option>
                                </select></div>
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Owned since</span>
                                </div>
                                <input type="date" class="form-control" id="owned_since" name="owned_since"
                                       value="{{ $reseller[0]->owned_since }}"></div>
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Next due date</span>
                                </div>
                                <input type="date" class="form-control next-dd" id="next_due_date" name="next_due_date"
                                       value="{{ $reseller[0]->next_due_date }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p>Limits:</p>
                        <div class="col-12 col-lg-3 mb-4">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Domains</span></div>
                                <input type="number" name="domains" class="form-control"
                                       value="{{$reseller[0]->domains_limit}}"
                                       min="1" max="9999">
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 mb-4">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Sub domains</span></div>
                                <input type="number" name="sub_domains" class="form-control"
                                       value="{{$reseller[0]->subdomains_limit}}" min="1" max="9999">
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 mb-4">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Disk</span></div>
                                <input type="number" name="disk" class="form-control"
                                       value="{{$reseller[0]->disk_as_gb}}"
                                       min="1" max="99999">
                                <div class="input-group-append"><span class="input-group-text">GB</span></div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 mb-4">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Email</span></div>
                                <input type="number" name="email" class="form-control"
                                       value="{{$reseller[0]->email_limit}}"
                                       min="1" max="99999">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-3 mb-4">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Bandwidth</span>
                                </div>
                                <input type="number" name="bandwidth" class="form-control"
                                       value="{{$reseller[0]->bandwidth}}" min="1"
                                       max="99999">
                                <div class="input-group-append"><span class="input-group-text">GB</span></div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 mb-4">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">FTP</span></div>
                                <input type="number" name="ftp" class="form-control" value="{{$reseller[0]->ftp_limit}}"
                                       min="1"
                                       max="99999">
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 mb-4">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">DB</span></div>
                                <input type="number" name="db" class="form-control" value="{{$reseller[0]->db_limit}}"
                                       min="1" max="99999">
                            </div>
                        </div>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" name="is_active" type="checkbox"
                               value="1" {{ ($reseller[0]->active === 1) ? 'checked' : '' }}>
                        <label class="form-check-label">
                            I still have this server
                        </label>
                    </div>

                    <div>
                        <button type="submit"
                                class="btn btn-success px-4 py-1 mt-3">
                            Update reseller hosting
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
