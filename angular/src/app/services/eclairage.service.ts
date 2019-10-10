import { Injectable } from '@angular/core';


/*  MES IMPORTS  */

/* HTTP  */
import { HttpClient } from '@angular/common/http';



@Injectable({
  providedIn: 'root'
})



export class EclairageService {

  eclairage;

  constructor(private maRequeteAjax: HttpClient) { 
    this.maRequeteAjax.get('/assets/json/eclairage.json').subscribe(
      data => this.eclairage = data
    );
  }

  switchOnOne(i: number) {
    this.eclairage[i].statut = 'On';
  }

  switchOffOne(i: number) {
    this.eclairage[i].statut = 'Off';
  }

  
}
