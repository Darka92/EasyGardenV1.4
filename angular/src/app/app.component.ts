import { Component, OnInit  } from '@angular/core';


/*  MES IMPORTS  */



@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})


export class AppComponent implements OnInit {

  isAuth = false;

  constructor() {

    setTimeout(
      () => {
        this.isAuth = true;
      }, 4000
    );
  }

  ngOnInit() {
  }

  
}

