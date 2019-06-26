import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class BassinService {

  bassin;

  constructor(private maRequeteAjax: HttpClient) { 
    this.maRequeteAjax.get('/assets/json/bassin.json').subscribe(
      data => this.bassin = data
    );
  }

  switchOnOne(i: number) {
    this.bassin[i].statut = 'On';
  }

  switchOffOne(i: number) {
    this.bassin[i].statut = 'Off';
  }

}
