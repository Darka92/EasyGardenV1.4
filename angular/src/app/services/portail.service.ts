import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})

export class PortailService {

  portail;

  constructor(private maRequeteAjax: HttpClient) {
    this.maRequeteAjax.get('/assets/json/portail.json').subscribe(
      data => this.portail = data
    );
  }

  switchOnOne(i: number) {
    this.portail[i].statut = 'Ouvert';
  }

  switchOffOne(i: number) {
    this.portail[i].statut = 'Ferme';
  }

}

