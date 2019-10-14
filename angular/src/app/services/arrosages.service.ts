import { Injectable } from '@angular/core';


/* MES IMPORTS  */
import { Arrosages } from 'src/app/intranet/classe/arrosages';



@Injectable({
  providedIn: 'root'
})



export class ArrosagesService {

  arrosages: Arrosages []=[];

  constructor() {

    let arrosages1: Arrosages = new Arrosages (1,'Réseau 1','Devant', '0.01', '9.2', '1');
    let arrosages2: Arrosages = new Arrosages (2,'Réseau 2','Derrière', '0.05', '10.23', '0');
    let arrosages3: Arrosages = new Arrosages (3,'Réseau 3','Côté G', '0.1', '8.7', '1');
    let arrosages4: Arrosages = new Arrosages (4,'Réseau 4','Côté D', '0.013', '9.8', '1');
    let arrosages5: Arrosages = new Arrosages (5,'Réseau 5','Tour bassin', '0.02', '8.9', '0');
    let arrosages6: Arrosages = new Arrosages (6,'Réseau 6','Massif arrière', '0.017', '9.9', '0');
    let arrosages7: Arrosages = new Arrosages (7,'Réseau 7','Massif avant', '0.4', '10', '1');
    let arrosages8: Arrosages = new Arrosages (8,'Réseau 8','Portail', '0.6', '9.5', '1');

    this.arrosages.push(arrosages1);
    this.arrosages.push(arrosages2);
    this.arrosages.push(arrosages3);
    this.arrosages.push(arrosages4);
    this.arrosages.push(arrosages5);
    this.arrosages.push(arrosages6);
    this.arrosages.push(arrosages7);
    this.arrosages.push(arrosages8);

  }

  public getArrosages():Arrosages[] {
    return this.arrosages;
  }

  public getArrosage(id:number):Arrosages{
    let tableauarrosage=this.getArrosages();
    return tableauarrosage.find(i=>i.id===id);
  };

  switchOnOne(i: number) {
    this.arrosages[i].statut = '1';
  }

  switchOffOne(i: number) {
    this.arrosages[i].statut = '0';
  }


}
