import { Injectable } from '@angular/core';


/*  MES IMPORTS  */

/* HTTP  */
import { HttpClient } from '@angular/common/http';



@Injectable({
  providedIn: 'root'
})


export class ArrosageService {

arrosage;

  constructor(private maRequeteAjax: HttpClient) {
    this.maRequeteAjax.get('/assets/json/arrosage.json').subscribe(
      data => this.arrosage = data
    );
  }

  switchOnOne(i: number) {
    this.arrosage[i].statut = 'On';
  }

  switchOffOne(i: number) {
    this.arrosage[i].statut = 'Off';
  }


}



