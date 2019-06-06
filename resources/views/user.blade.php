@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section class="text-justify">
    <div class="title">
        <h2 class="blue text-uppercase font-title">Gestión de usuarios del centro deportivo {{ Auth::user()->club->name }}</h2>
    </div>

    <div class="col-sm-12 col-md-11 m-auto">
        <div class="mb-5">
            <p>Gestionar nuestros usuario es igual que al gestionar las pistas del centro, con <b>Padelistas</b> intentamos que de <b>forma sencilla, fácil y de forma ágil en unos pocos clics</b> dichas gestiones. En la siguiente tabla puedes ver un listado de los usuarios que nos siguen, es decir, los <b>usuarios que les gusta</b> nuestro club deportivo <b>{{ Auth::user()->club->name }}</b> con una breve información, no obstante siempre podras ver más información de la misma.</p>
        </div>        
    
        <div class="dos-grid">
            <div class="alert alert-primary mt-3" role="alert">No dudes en <b>añadir un usuario</b> a la aplicación...</div>
            <a href="{{ route('user.create') }}" class="center">
                <button class="btn-club btn btn-outline-info btn-lg">Registrar un usuario</button>
            </a>
        </div>

        <div class="table-responsive py-2">
            <div class="alert alert-success my-5" role="alert">Lista de usuario que se han suscrito al club...</div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Nombre completo</th>
                        <th>Documento de identidad</th>
                        <th>Número movil</th>
                        <th>Género</th>
                        <th>Dirección</th>
                        <th style="padding-left: 2em;">Gestión</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($follows ?? [] as $item)                        
                        <tr>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->identity_card }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->gender }}</td>
                            <td class="nowgrap">{{ $item->address }}</td>
                            <td class="d-flex align-items-center">
                                <form action="{{ route('user.show', $item->id) }}" method="">                                
                                    <button type='submit' class="btn-crud pt-1" value='{{ $item->id }}'><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#34495e"><g id="surface1"><path d="M19.2,19.2c-6.315,0 -11.52,5.205 -11.52,11.52v130.56c0,6.315 5.205,11.52 11.52,11.52h153.6c6.315,0 11.52,-5.205 11.52,-11.52v-130.56c0,-6.315 -5.205,-11.52 -11.52,-11.52zM19.2,26.88h153.6c2.16,0 3.84,1.68 3.84,3.84v130.56c0,2.16 -1.68,3.84 -3.84,3.84h-153.6c-2.16,0 -3.84,-1.68 -3.84,-3.84v-130.56c0,-2.16 1.68,-3.84 3.84,-3.84zM96,61.44c-1.44,0 -2.805,0.075 -4.2,0.24c-31.23,2.52 -56.28,31.8 -56.28,31.8c-1.26,1.44 -1.26,3.6 0,5.04c0,0 25.05,29.28 56.28,31.8c1.395,0.165 2.76,0.24 4.2,0.24c1.44,0 2.805,-0.075 4.2,-0.24c31.23,-2.52 56.28,-31.8 56.28,-31.8c1.26,-1.44 1.26,-3.6 0,-5.04c0,0 -25.05,-29.28 -56.28,-31.8c-1.395,-0.165 -2.76,-0.24 -4.2,-0.24zM96,69.12c0.915,0 1.845,0.06 2.76,0.12c0.045,0 0.075,0 0.12,0c13.53,1.425 24,12.84 24,26.76c0,13.92 -10.47,25.335 -24,26.76c-0.945,0.105 -1.905,0.12 -2.88,0.12c-0.93,0 -1.86,-0.03 -2.76,-0.12c-0.045,0 -0.075,0 -0.12,0c-13.53,-1.425 -24,-12.84 -24,-26.76c0,-13.92 10.47,-25.335 24,-26.76c0.045,0 0.075,0 0.12,0c0.9,-0.09 1.83,-0.12 2.76,-0.12zM66.48,78.24c-3.15,5.205 -5.04,11.25 -5.04,17.76c0,6.51 1.89,12.555 5.04,17.76c-11.61,-6.825 -19.995,-15.315 -22.32,-17.76c2.325,-2.445 10.71,-10.935 22.32,-17.76zM125.52,78.24c11.61,6.825 19.995,15.315 22.32,17.76c-2.325,2.445 -10.71,10.935 -22.32,17.76c3.15,-5.205 5.04,-11.25 5.04,-17.76c0,-6.51 -1.89,-12.555 -5.04,-17.76zM96,80.64c-8.445,0 -15.36,6.915 -15.36,15.36c0,8.445 6.915,15.36 15.36,15.36c8.445,0 15.36,-6.915 15.36,-15.36c0,-8.445 -6.915,-15.36 -15.36,-15.36zM96,88.32c4.29,0 7.68,3.39 7.68,7.68c0,4.29 -3.39,7.68 -7.68,7.68c-4.29,0 -7.68,-3.39 -7.68,-7.68c0,-4.29 3.39,-7.68 7.68,-7.68z"></path></g></g></g></svg></button>
                                </form>
                        
                                <form action="{{ route('user.edit', $item->id) }}" method="">
                                    <button type='submit' class="btn-crud" value='{{ $item->id }}'><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#20926b"><g id="surface1"><path d="M170.28,7.68c-3.615,0 -7.335,1.335 -10.08,4.08l-5.16,5.28l19.92,19.92c-0.015,0.015 5.28,-5.16 5.28,-5.16c5.505,-5.505 5.505,-14.535 0,-20.04c-2.76,-2.76 -6.345,-4.08 -9.96,-4.08zM148.8,22.8l-87.24,87.24l-0.24,1.2l-3.6,18.6l-1.2,5.64l5.64,-1.2l18.6,-3.6l1.2,-0.24l87.24,-87.24l-5.52,-5.4l-85.44,85.32l-9.36,-9.36l85.32,-85.44zM11.52,38.4c-2.13,0 -3.84,1.725 -3.84,3.84v138.24c0,2.115 1.71,3.84 3.84,3.84h138.24c2.13,0 3.84,-1.725 3.84,-3.84v-111.36l-7.68,7.68v99.84h-130.56v-130.56h99.84l7.68,-7.68z"></path></g></g></g></svg></button>
                                </form>
            {{-- Quita de la pivot - no eliminar. Si se crea add a la pivot... --}}
                                <form action="{{ route('user.update', $item->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type='submit' class="btn-crud pt-1" value='{{ $item->id }}'><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#c23b2c"><path d="M34.56,15.36c-10.55814,0 -19.2,8.64186 -19.2,19.2v122.88c0,10.55814 8.64186,19.2 19.2,19.2h122.88c10.55814,0 19.2,-8.64186 19.2,-19.2v-122.88c0,-10.55814 -8.64186,-19.2 -19.2,-19.2zM34.56,23.04h122.88c6.40698,0 11.52,5.11302 11.52,11.52v122.88c0,6.40698 -5.11302,11.52 -11.52,11.52h-122.88c-6.40698,0 -11.52,-5.11302 -11.52,-11.52v-122.88c0,-6.40698 5.11302,-11.52 11.52,-11.52zM64.155,58.725l-5.43,5.43l31.845,31.845l-31.845,31.845l5.43,5.43l31.845,-31.845l31.845,31.845l5.43,-5.43l-31.845,-31.845l31.845,-31.845l-5.43,-5.43l-31.845,31.845z"></path></g></g></svg></button>
                                </form>
                            </td>                                     
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-responsive py-2">
            <div class="alert alert-warning my-5" role="alert">Lista de usuario que han dejado de seguir al club...</div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Nombre completo</th>
                        <th>Documento de identidad</th>
                        <th>Número movil</th>
                        <th>Género</th>
                        <th>Dirección</th>
                        <th style="padding-left: 2em;">Gestión</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unfollows ?? [] as $item)
                        <tr>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->identity_card }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->gender }}</td>
                            <td class="nowgrap">{{ $item->address }}</td>
                            <td class="d-flex align-items-center">
                                <form action="{{ route('user.show', $item->id) }}" method="">                                
                                    <button type='submit' class="btn-crud pt-1" value='{{ $item->id }}'><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#34495e"><g id="surface1"><path d="M19.2,19.2c-6.315,0 -11.52,5.205 -11.52,11.52v130.56c0,6.315 5.205,11.52 11.52,11.52h153.6c6.315,0 11.52,-5.205 11.52,-11.52v-130.56c0,-6.315 -5.205,-11.52 -11.52,-11.52zM19.2,26.88h153.6c2.16,0 3.84,1.68 3.84,3.84v130.56c0,2.16 -1.68,3.84 -3.84,3.84h-153.6c-2.16,0 -3.84,-1.68 -3.84,-3.84v-130.56c0,-2.16 1.68,-3.84 3.84,-3.84zM96,61.44c-1.44,0 -2.805,0.075 -4.2,0.24c-31.23,2.52 -56.28,31.8 -56.28,31.8c-1.26,1.44 -1.26,3.6 0,5.04c0,0 25.05,29.28 56.28,31.8c1.395,0.165 2.76,0.24 4.2,0.24c1.44,0 2.805,-0.075 4.2,-0.24c31.23,-2.52 56.28,-31.8 56.28,-31.8c1.26,-1.44 1.26,-3.6 0,-5.04c0,0 -25.05,-29.28 -56.28,-31.8c-1.395,-0.165 -2.76,-0.24 -4.2,-0.24zM96,69.12c0.915,0 1.845,0.06 2.76,0.12c0.045,0 0.075,0 0.12,0c13.53,1.425 24,12.84 24,26.76c0,13.92 -10.47,25.335 -24,26.76c-0.945,0.105 -1.905,0.12 -2.88,0.12c-0.93,0 -1.86,-0.03 -2.76,-0.12c-0.045,0 -0.075,0 -0.12,0c-13.53,-1.425 -24,-12.84 -24,-26.76c0,-13.92 10.47,-25.335 24,-26.76c0.045,0 0.075,0 0.12,0c0.9,-0.09 1.83,-0.12 2.76,-0.12zM66.48,78.24c-3.15,5.205 -5.04,11.25 -5.04,17.76c0,6.51 1.89,12.555 5.04,17.76c-11.61,-6.825 -19.995,-15.315 -22.32,-17.76c2.325,-2.445 10.71,-10.935 22.32,-17.76zM125.52,78.24c11.61,6.825 19.995,15.315 22.32,17.76c-2.325,2.445 -10.71,10.935 -22.32,17.76c3.15,-5.205 5.04,-11.25 5.04,-17.76c0,-6.51 -1.89,-12.555 -5.04,-17.76zM96,80.64c-8.445,0 -15.36,6.915 -15.36,15.36c0,8.445 6.915,15.36 15.36,15.36c8.445,0 15.36,-6.915 15.36,-15.36c0,-8.445 -6.915,-15.36 -15.36,-15.36zM96,88.32c4.29,0 7.68,3.39 7.68,7.68c0,4.29 -3.39,7.68 -7.68,7.68c-4.29,0 -7.68,-3.39 -7.68,-7.68c0,-4.29 3.39,-7.68 7.68,-7.68z"></path></g></g></g></svg></button>
                                </form>
                        
                                <form action="{{ route('user.edit', $item->id) }}" method="">
                                    <button type='submit' class="btn-crud" value='{{ $item->id }}'><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#20926b"><g id="surface1"><path d="M170.28,7.68c-3.615,0 -7.335,1.335 -10.08,4.08l-5.16,5.28l19.92,19.92c-0.015,0.015 5.28,-5.16 5.28,-5.16c5.505,-5.505 5.505,-14.535 0,-20.04c-2.76,-2.76 -6.345,-4.08 -9.96,-4.08zM148.8,22.8l-87.24,87.24l-0.24,1.2l-3.6,18.6l-1.2,5.64l5.64,-1.2l18.6,-3.6l1.2,-0.24l87.24,-87.24l-5.52,-5.4l-85.44,85.32l-9.36,-9.36l85.32,-85.44zM11.52,38.4c-2.13,0 -3.84,1.725 -3.84,3.84v138.24c0,2.115 1.71,3.84 3.84,3.84h138.24c2.13,0 3.84,-1.725 3.84,-3.84v-111.36l-7.68,7.68v99.84h-130.56v-130.56h99.84l7.68,-7.68z"></path></g></g></g></svg></button>
                                </form>

                                <form action="{{ route('user.update', $item->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type='submit' class="btn-crud pt-1" value='{{ $item->id }}'><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#c23b2c"><path d="M34.56,15.36c-10.55814,0 -19.2,8.64186 -19.2,19.2v122.88c0,10.55814 8.64186,19.2 19.2,19.2h122.88c10.55814,0 19.2,-8.64186 19.2,-19.2v-122.88c0,-10.55814 -8.64186,-19.2 -19.2,-19.2zM34.56,23.04h122.88c6.40698,0 11.52,5.11302 11.52,11.52v122.88c0,6.40698 -5.11302,11.52 -11.52,11.52h-122.88c-6.40698,0 -11.52,-5.11302 -11.52,-11.52v-122.88c0,-6.40698 5.11302,-11.52 11.52,-11.52zM64.155,58.725l-5.43,5.43l31.845,31.845l-31.845,31.845l5.43,5.43l31.845,-31.845l31.845,31.845l5.43,-5.43l-31.845,-31.845l31.845,-31.845l-5.43,-5.43l-31.845,31.845z"></path></g></g></svg></button>
                                </form>
                            </td>                                     
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
