<nav class="navbar navbar-expand-lg navbar-light bg-light" style = "background-color: rgb(30, 116, 37)">
  <a class="navbar-brand" href="#">Organization</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    	<li class="nav-item">
        <a class="nav-link active" href = "/home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href = "{{route('organization.create')}}">Create Campaign </span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href = "{{route('home.campaignlist')}}">Campaign list </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href = "{{route('home.bookmarkslist')}}">Bookmarks list</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href = "{{route('organization.getFromNode')}}">Connect Node</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href = "{{route('organization.generatereport')}}">Generate Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href = "{{route('organization.dashboard')}}">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href = "{{route('organization.profile')}}">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href ="/logout">logout</a>
      </li>
    </ul>
  </div>
</nav> 