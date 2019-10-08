import { Component, OnInit, OnDestroy } from '@angular/core';
import { ArrosageService } from 'src/app/services/arrosage.service';
import { HttpClient, HttpParams } from '@angular/common/http';


@Component({
  selector: 'app-arrosage',
  templateUrl: './arrosage.component.html',
  styleUrls: ['./arrosage.component.css'],
})

export class ArrosageComponent implements OnInit, OnDestroy {

  baseURL = 'http://localhost:4200/intranet/easy-garden/arrosage/modifierequipement';

  data;

  index: number;

  constructor(private arrosageService: ArrosageService, private httpClient: HttpClient) {

    /*console.log(this.data);*/

    this.data = this.arrosageService.arrosage;
  }

  ngOnInit() {
    // Appeler méthode de service
  }

  ngOnDestroy() {
  }

  getColor(statut) {
    if (statut === 'On') {
      return 'green';
    } else if (statut === 'Off') {
      return 'red';
    }
  }

  onSwitch(i, statut) {
    if (statut === 'On') {
      this.arrosageService.switchOffOne(i);
    } else if (statut === 'Off') {
      this.arrosageService.switchOnOne(i);
    }
  }

  /* Préremplissage auto des paramètres de l'entrée sélectionnée sur les form input (modifier équipement)*/
  /*update(d1, d2, d3 , d4, d5) {
    let statut = d1;
    let nom = d2;
    let localisation = d3;
    let capteurDebit = d4;
    let capteurPression = d5;
    console.log(statut, nom, localisation, capteurDebit, capteurPression);
  }*/


  update(d1, d2, d3 , d4, d5) {
    let params = new HttpParams()
    .set('statut', d1);
    /*.set('nom', d2)
    .set('localisation', d3)
    .set('capteurDebit', d4)
    .set('capteurPression', d5);*/

    /*console.log(params.getAll('localisation','nom'));*/

    //console.log('update ' + params.toString());
    /*console.log(d1, d2, d3, d4, d5);*/
    /*return this.httpClient.get<repos[]>(this.baseURL + '/intranet/easy-garden/arrosage/modifierequipement' + userName + '/repos',{params})*/

    return this.httpClient.get(this.baseURL, null);
  }

}
