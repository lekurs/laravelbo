@extends('admin-layout')

@section('title', 'Nos réalisations' )

@section('body')
    <div class="mout-bo-section-container">
        <h2 class="admin-title">Réalisations</h2>

        <table id="projects" class="table table-hover mout-bo-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Titre du projet</th>
                <th>Nom du client</th>
                <th>Photo principale</th>
                <th>Couleur</th>
                <th>Nb photos</th>
                <th>Domaines</th>
                <th>Date de réalisation</th>
                <th>Date de fin</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->client->name }}</td>
                <td><img src="{{ asset('assets/images/uploads/projects/' . $project->slug . '/' . $project->imagePortfolioProjectPath) }}" alt="{{ $project->title }}" class="img-thumbnail"></td>
                <td>{{ $project->colorProject }}</td>
                <td>{{ count($project->imagesProjects) }}</td>
                <td>
                    @foreach($project->services as $service)
                        {{ $service->libelle }}
                    @endforeach
                </td>
                <td>{{ $project->created_at }}</td>
                <td>{{ $project->completionDate }}</td>
                <td><i class="fal fa-edit"></i></td>
                <td><i class="fal fa-trash"></i></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mout-client-creation-buttons-container">
        <a href="{{ route('projectCreation') }}" class="btn btn-mout mout-btn-add">
            <span class="btn-label"><i class="fal fa-chevron-right"></i></span>Créer une nouvelle réalisation
        </a>
    </div>
@endsection

@section('js')
    <script>
        $('#projects').dataTable({

        });
    </script>
@endsection

