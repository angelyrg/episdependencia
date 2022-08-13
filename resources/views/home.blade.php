@extends('layouts.main')

@section('content')
    
<div class="row">
    <div class="col-12">
      <div class="card card-chart">
        <div class="card-header ">
          <div class="row">
            <div class="col-sm-6 text-left">
                <h5 class="card-category">Información</h5>
                <h2 class="card-title">Reglamento</h2>
            </div>
          </div>
        </div>
        <div class="card-body px-3">
            <div class="row">
                <div class="col ">
                  <p>El presente reglamento tiene la finalidad de normar, coordinar, orientar, organizar, dirigir, asesorar y supervisar en forma eficiente la implementación y ejecución de las actividades de servicio social universitario y extensión cultural de los estudiantes, así como la proyección social de los docentes de la Universidad Nacional de Huancavelica (UNH) ligados al currículo de estudio de las diferentes carreras profesionales, realizando acciones en beneficio de la sociedad como responsabilidad social universitaria.</p>
                  <p>A estas se pueden incorporar los egresados y administrativos de la UNH.</p>

                  <a href="{{asset('files/REGLAMENTO-2022.pdf')}}" class="btn btn-sm btn-success btn-simple " target="_blank" ><i class="tim-icons icon-cloud-download-93"></i> Ver reglamento</a>

                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">

    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Modalidad</h5>
          <h3 class="card-title"><i class="tim-icons icon-paper text-primary"></i> Servicio Social</h3>
        </div>
        <div class="card-body px-3">
            <div class="row">
                <div class="col ">
                  <p>El Servicio Social Universitario consiste en la realización obligatoria de actividades temporales que ejecutan los estudiantes con el apoyo de los grupos de interés, tendientes a la aplicación de los conocimientos que hayan adquirido en sus estudios universitarios y que implican una contribución a la ajecución de políticas públicas de interés social y fomenten un comportamiento altruista y solidario que aporta a la mejora de la calidad de vida de los grupos vulnerables de la sociedad.                  </p>
                </div>
              </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Modalidad</h5>
          <h3 class="card-title"><i class="tim-icons icon-paper text-info"></i> Extensión Cultural</h3>
        </div>
        <div class="card-body px-3">
            <div class="row">
                <div class="col ">
                  <p>La extensición cultural es función básica de la universidad contribuye en la divulgación de conocimientos, investigaciones y otras labores del quehacer universitario. Tiene una duración mínima de dos (02) semestres académicos o un año para los proyectos de extensión cultural, y una duración mínima de cuatro (04) meses para los otras líneas de acción.                  </p>
                </div>
              </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Modalidad</h5>
          <h3 class="card-title"><i class="tim-icons icon-paper text-success"></i> Proyección Social</h3>
        </div>
        <div class="card-body px-3">
            <div class="row">
                <div class="col ">
                  <p>La Proyección Social es una actividad misional e interactiva de la Universidad realizada a través de los docentes, responsables de la transferencia, prestación de servicios y comunicación del conocimiento que genere impacto y reconocimiento en la comunidad mediante prácticas socialmente responsables. Tiene una duración mínima de cuatro (04) meses o un semestre académico.                  </p>
                </div>
              </div>
        </div>
      </div>
    </div>



    
</div>

@endsection