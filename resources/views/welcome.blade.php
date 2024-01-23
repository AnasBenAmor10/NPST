<x-layout >
    <!-- Cards Section -->
    <div class="pricing-plans" >
        <div class="single-price">
            <h1>Etudiants</h1>
            <div class="price">
                <img src="{{asset('assets/img/etudiant.png')}}" height="50px">
            </div>
            <div class="services">
                <h4>Empowering Minds, Shaping Futures.</h4>
                
            </div>
            <a href="/login" id="bottom">Select</a>
        </div>


        <div class="single-price">
            <h1>Enseignants</h1>
            <div class="price">
                <img src="{{asset('assets/img/teacher.png')}}" height="50px">
            </div>
            <div class="services">
                <h4>Inspiring Knowledge, Nurturing Minds.</h4>
                
            </div>
            <a href="/lotest" id="bottom">Select</a>
        </div>


        <div class="single-price">
            <h1>Societés</h1>
            <div class="price">
                <img src="{{asset('assets/img/company.png')}}" height="50px">
            </div>
            <div class="services">
                <h4>Connecting Talents</h4>
                
            </div>
            <a href="/dashboard/company" id="bottom">Select</a>
        </div>


    </div>
</x-layout>
