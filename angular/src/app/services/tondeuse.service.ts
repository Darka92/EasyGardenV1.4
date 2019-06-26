import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})

export class TondeuseService {

  tondeuse;

  constructor(private maRequeteAjax: HttpClient) {
    this.maRequeteAjax.get('/assets/json/tondeuse.json').subscribe(
      data => this.tondeuse = data
    );
  }

  switchOnOne(i: number) {
    this.tondeuse[i].statut = 'On';
  }

  switchOffOne(i: number) {
    this.tondeuse[i].statut = 'Off';
  }

}
