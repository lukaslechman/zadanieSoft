<template>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark  ">
    <div class="container-fluid">
      <router-link  class="navbar-brand" to='/'>Simple car manager</router-link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to='/createCar'>Create Car</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to='/createPart'>Create Part</router-link>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Listings
            </a>
            <ul class="dropdown-menu">
              <li><router-link  class="dropdown-item" to='/carList'> List of cars</router-link>  </li>
              <li><router-link  class="dropdown-item" to='/partList'> List of parts</router-link> </li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  </template>