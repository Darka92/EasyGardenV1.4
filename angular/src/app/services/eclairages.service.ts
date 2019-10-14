import { Injectable } from '@angular/core';


/* MES IMPORTS  */
import { Eclairage } from 'src/app/intranet/models/eclairage';



@Injectable({
  providedIn: 'root'
})



export class EclairagesService {

  eclairages: Eclairage []=[];

  constructor() {

    let eclairages1: Eclairage = new Eclairage (1,'Secteur 1','Allée', '0', '34205', '1');
    let eclairages2: Eclairage = new Eclairage (2,'Secteur 2','Façade', '1', '30007', '0');
    let eclairages3: Eclairage = new Eclairage (3,'Secteur 3','Perron', '0', '36548', '1');
    let eclairages4: Eclairage = new Eclairage (4,'Secteur 4','Arbres', '0', '37841', '1');
    let eclairages5: Eclairage = new Eclairage (5,'Secteur 5','Palmiers', '0', '39148', '0');
    let eclairages6: Eclairage = new Eclairage (6,'Secteur 6','Massif bassin', '0', '36218', '0');
    let eclairages7: Eclairage = new Eclairage (7,'Secteur 7','Massif avant', '1', '33210', '1');
    let eclairages8: Eclairage = new Eclairage (8,'Secteur 8','Portail', '0', '35498', '1');

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
    this.eclairages[i].statut = '1';
  }

  switchOffOne(i: number) {
    this.eclairages[i].statut = '0';
  }


}
