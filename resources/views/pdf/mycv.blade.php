<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Template</title>
    <style>
        /* Base styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: separate;
        }

        td {
            vertical-align: top;
        }

        /* Section headings */
        h3 {
            margin-top: 1px;
        }

        /* Name details */
        .name {
            margin-bottom: 1px;
        }

        /* Contact details */
        .contact {
            margin-bottom: 1px;
            padding-top: 3%;
            padding-left: 40%;
        }

        a {
            text-decoration: none;
            /* Removes underline */
            color: black;
        }

        p {
            font-size: 12px;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f3f3f3; /* Light gray background color */
            padding: 10px 20px; /* Padding for the footer */
            text-align: center; /* Center-align the text */
            font-size: 12px; /* Smaller font size */
            border-top: 1px solid #ccc; /* Light gray border at the top */
        }

    </style>
</head>

<body>
    <table>
        <tr>
            <td class="name">
                <h2>{{ $cv_details['user_details']->d_name }}</h2>
            </td>
            <td class="contact">
                <b>
                    <address>{{ $cv_details['user_details']->address }}</address>
                </b>
                <b><span>{{ $cv_details['user_details']->p_number }}</span></b>
                @foreach ($cv_details['user_details']->connections as $connection)
                    <br>
                    <a target="blank" href="{{ $connection->link }}">
                        <strong>{{ $connection->link }}</strong></a>
                @endforeach
            </td>
        </tr>
    </table>
    <hr>
    <section class="summery">
        <h3>Professional Summary</h3>
        <p>{{ $cv_details['user_details']->about }}</p>
    </section>
    <hr>
    <section class="work-history">
        <h3>Work History</h3>
        @foreach ($cv_details['work_experience'] as $experience)
            <h4>{{ $experience->position }} | {{ $experience->company }}</h4>
            <p><strong>Dates:</strong> {{ $experience->from }} - {{ $experience->to }}</p>
            {!! $experience->responsibility !!}
        @endforeach
    </section>
    <hr>
    <section class="project">
        <h3>Projects</h3>
        <p>
        @foreach ($cv_details['project_details'] as $project)
            <strong>{{ $project->title }}</strong> | {{ $project->ProjectTypeDetails->type }}
            <br>
            {{ $project->description }}
            <br>
            <a href="{{ $project->repository }}">{{ $project->repository }}</a>
            <br>
            <br>
        @endforeach
        </p>
    </section>
    <hr>
    <section class="skill">
        <h3>Skills</h3>
        <p>
            @foreach ($cv_details['skills'] as $skill)
                {{ $skill->skill }}
                <br>
            @endforeach
        </p>
    </section>
    <hr>
    <section class="education">
        <h3>Education</h3>
        <p>
            @foreach ($cv_details['education_details'] as $education)
                <strong>{{ $education->EducationDetails->title }}</strong> | {{ $education->SchoolDetails->from }} - {{ $education->SchoolDetails->to }}
                <br>
                <strong>{{ $education->SchoolDetails->title }}</strong>
                <br>
                {{ $education->description }}
                <br>
                <br>
            @endforeach
        </p>
    </section>
    <hr>
    <footer class="footer">
        <div class="container">
            <p class="small mb-0 text-light">
                &copy;
                {{$year}} Created <i class="ti-heart text-danger"></i> By <a href="http://devcrud.com"
                    target="_blank"><span class="text-danger" title="Bootstrap 4 Themes and Dashboards"><b>IDK</b>
                        solution</span></a>
            </p>
        </div>
    </footer>
</body>

</html>
