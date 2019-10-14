import { Injectable } from '@angular/core';


/* MES IMPORTS  */
import { Arrosage } from 'src/app/intranet/models/arrosage';



@Injectable({
  providedIn: 'root'
})



export class ArrosagesService {

  arrosages: Arrosage []=[];

  constructor() {

    let arrosages1: Arrosage = new Arrosage (1,'Réseau 1','Devant', '0.01', '9.2', '1');
    let arrosages2: Arrosage = new Arrosage (2,'Réseau 2','Derrière', '0.05', '10.23', '0');
    let arrosages3: Arrosage = new Arrosage (3,'Réseau 3','Côté G', '0.1', '8.7', '1');
    let arrosages4: Arrosage = new Arrosage (4,'Réseau 4','Côté D', '0.013', '9.8', '1');
    let arrosages5: Arrosage = new Arrosage (5,'Réseau 5','Tour bassin', '0.02', '8.9', '0');
    let arrosages6: Arrosage = new Arrosage (6,'Réseau 6','Massif arrière', '0.017', '9.9', '0');
    let arrosages7: Arrosage = new Arrosage (7,'Réseau 7','Massif avant', '0.4', '10', '1');
    let arrosages8: Arrosage = new Arrosage (8,'Réseau 8','Portail', '0.6', '9.5', '1');

    this.arrosages.push(arrosages1);
    this.arrosages.push(arrosages2);
    this.arrosages.push(arrosages3);
    this.arrosages.push(arrosages4);
    this.arrosages.push(arrosages5);
    this.arrosages.push(arrosages6);
    this.arrosages.push(arrosages7);
    this.arrosages.push(arrosages8);

  }

  public getArrosages():Arrosage[] {
    return this.arrosages;
    /*console.log(this.arrosages);*/
  }

  public getArrosage(arrosageId:number):Arrosage{
    let tableauarrosage=this.getArrosages();
    return tableauarrosage.find(i=>i.arrosageId===arrosageId);
  };

  switchOnOne(i: number) {
    this.arrosages[i].statut = '1';
  }

  switchOffOne(i: number) {
    this.arrosages[i].statut = '0';
  }


}
