<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" >
            {{-- Usertype : 1-Etudiant  2-Enseignant    3-Societé --}}
            @if(auth()->user()->usertype==1)
                  {{__("welcome ". Auth::user()->name ." to the Student Dashboard")}}
            @elseif(auth()->user()->usertype==3)
                  {{__("welcome ". Auth::user()->name ." to the Company Dashboard")}}
            @elseif(auth()->user()->usertype==2)
                  {{__("welcome ". Auth::user()->name ." to the Teacher Dashboard")}}      
            @endif
        </h2>
    </x-slot>
    @if(auth()->user()->usertype==1)
    <div class="dashboard">
        <div class="left"> 
            <div class="navigation">
                <div class="wrapper2">
                    <div class="abilan">
                        <img src="{{asset('assets/img/aaa.png')}}" />
                    </div>
                    <div class="folders">Folders</div>
                        <div class="folder-icons">
                            <a href="/dashboard/Stages" class="icon-link">
                                <div class="icon1">
                                     <img src="{{asset('assets/img/stage.png')}}" />
                                </div>
                                <div class="icon-name1">Mes stage
                                </div>
                            </a>
                        </div>
                        {{-- <div class="folder-icons">
                            <a href="/dashboard/demande-Encadrant" class="icon-link">
                            <div class="icon1">
                                    <img src="{{asset('assets/img/icon2.png')}}" />
                             </div>
                            <div class="icon-name2">Demande Encadrant</div>
                            </a>
                        </div> --}}
                        <div class="folder-icons">
                            <a href="/dashboard/demande-stage" class="icon-link">
                            <div class="icon1">
                                    <img src="{{asset('assets/img/icon1.png')}}" />
                            </div>
                            <div class="icon-name3">Demande Stage</div>
                            </a>
                        </div>
                        <div class="folder-icons">
                            <a href="/dashboard/informations" class="icon-link">
                            <div class="icon1">
                                    <img src="{{asset('assets/img/inf.png')}}" />
                            </div>
                            <div class="icon-name4">Mes informations</div>
                            </a>
                        </div>
        
                        <div class="folder-icons">
                            <a href="/dashboard/view-my-stage-requests" class="icon-link">
                              <div class="icon1">
                                     <img src="{{asset('assets/img/adm.png')}}" />
                              </div>
                              <div class="icon-name5">view mes requests</div>
                            </a>
                        </div>
        
                    </div>    
                </div>
            </div>
            @elseif(auth()->user()->usertype==3)
            <div class="dashboard">
        <div class="left"> 
            <div class="navigation">
                <div class="wrapper2">
                    <div class="abilan">
                        <img src="{{asset('assets/img/aaa.png')}}" />
                    </div>
                    <div class="folders">Folders</div>
                        <div class="folder-icons">
                            <a href="/dashboard/company/informations" class="icon-link">
                                <div class="icon1">
                                     <img src="{{asset('assets/img/inf.png')}}" />
                                </div>
                                <div class="icon-name1">informations Personnel
                                </div>
                            </a>
                        </div>
                        <div class="folder-icons">
                            <a href="/dashboard/company/view-stage-requests" class="icon-link">
                            <div class="icon1">
                                    <img src="{{asset('assets/img/icon2.png')}}" />
                             </div>
                            <div class="icon-name2">Les demandes</div>
                            </a>
                        </div>
                        </div>    
                </div>
            </div>
            @elseif(auth()->user()->usertype==2)
            <div class="dashboard">
        <div class="left"> 
            <div class="navigation">
                <div class="wrapper2">
                    <div class="abilan">
                        <img src="{{asset('assets/img/aaa.png')}}" />
                    </div>
                    <div class="folders">Folders</div>
                        <div class="folder-icons">
                            <a href="/dashboard/company/informations" class="icon-link">
                                <div class="icon1">
                                     <img src="{{asset('assets/img/inf.png')}}" />
                                </div>
                                <div class="icon-name1">informations Personnel
                                </div>
                            </a>
                        </div>
                        <div class="folder-icons">
                            <a href="/dashboard/company/view-stage-requests" class="icon-link">
                            <div class="icon1">
                                    <img src="{{asset('assets/img/icon2.png')}}" />
                             </div>
                            <div class="icon-name2">Les demandes</div>
                            </a>
                        </div>
                        </div>    
                </div>
            </div>
            @endif

            <div class="right-side">
                   @yield('container')
            </div> 
       </div>
         
</x-app-layout>
