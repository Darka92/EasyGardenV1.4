import { Injectable } from '@angular/core';


/* MES IMPORTS  */
import { Eclairage } from 'src/app/intranet/models/eclairage';



@Injectable({
  providedIn: 'root'
})



export class EclairagesService {

  eclairages: Eclairage []=[];

  constructor() {

    let eclairages1: Eclairage = new Eclairage (1,'Secteur 1','Allée', false, 34205, true);
    let eclairages2: Eclairage = new Eclairage (2,'Secteur 2','Façade', true, 30007, false);
    let eclairages3: Eclairage = new Eclairage (3,'Secteur 3','Perron', false, 36548, true);
    let eclairages4: Eclairage = new Eclairage (4,'Secteur 4','Arbres', false, 37841, true);
    let eclairages5: Eclairage = new Eclairage (5,'Secteur 5','Palmiers', true, 39148, false);
    let eclairages6: Eclairage = new Eclairage (6,'Secteur 6','Massif bassin', false, 36218, false);
    let eclairages7: Eclairage = new Eclairage (7,'Secteur 7','Massif avant', false, 33210, true);
    let eclairages8: Eclairage = new Eclairage (8,'Secteur 8','Portail', false, 35498, true);

    this.eclairages.push(eclairages1);
    this.eclairages.push(eclairages2);
    this.eclairages.push(eclairages3);
    this.eclairages.push(eclairages4);
    this.eclairages.push(eclairages5);
    this.eclairages.push(eclairages6);
    this.eclairages.push(eclairages7);
    this.eclairages.push(eclairages8);

  }

  public getEclairages():Eclairage[] {
    return this.eclairages;
    /*console.log(this.eclairages);*/
  }

  public getEclairage(eclairageId:number):Eclairage{
    let tableaueclairage=this.getEclairages();
    return tableaueclairage.find(i=>i.eclairageId===eclairageId);
  };

  switchOnOne(i: number) {
    this.eclairages[i].statut = true;
  }

  switchOffOne(i: number) {
    this.eclairages[i].statut = false;
  }


}
