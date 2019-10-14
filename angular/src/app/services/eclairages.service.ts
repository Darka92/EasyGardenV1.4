import { Injectable } from '@angular/core';


/* MES IMPORTS  */
import { Eclairages } from 'src/app/intranet/classe/eclairages';



@Injectable({
  providedIn: 'root'
})



export class EclairagesService {

  eclairages: Eclairages []=[];

  constructor() {

    let eclairages1: Eclairages = new Eclairages (1,'Réseau 1','Devant', '0.01', '9.2', '1');
    let eclairages2: Eclairages = new Eclairages (2,'Réseau 2','Derrière', '0.05', '10.23', '0');
    let eclairages3: Eclairages = new Eclairages (3,'Réseau 3','Côté G', '0.1', '8.7', '1');
    let eclairages4: Eclairages = new Eclairages (4,'Réseau 4','Côté D', '0.013', '9.8', '1');
    let eclairages5: Eclairages = new Eclairages (5,'Réseau 5','Tour bassin', '0.02', '8.9', '0');
    let eclairages6: Eclairages = new Eclairages (6,'Réseau 6','Massif arrière', '0.017', '9.9', '0');
    let eclairages7: Eclairages = new Eclairages (7,'Réseau 7','Massif avant', '0.4', '10', '1');
    let eclairages8: Eclairages = new Eclairages (8,'Réseau 8','Portail', '0.6', '9.5', '1');

    this.eclairages.push(eclairages1);
    this.eclairages.push(eclairages2);
    this.eclairages.push(eclairages3);
    this.eclairages.push(eclairages4);
    this.eclairages.push(eclairages5);
    this.eclairages.push(eclairages6);
    this.eclairages.push(eclairages7);
    this.eclairages.push(eclairages8);

   }

   public getEclairages():Eclairages[] {
    return this.eclairages;
  }

  public getEclairage(id:number):Eclairages{
    let tableaueclairage=this.getEclairages();
    return tableaueclairage.find(i=>i.id===id);
  };

  switchOnOne(i: number) {
    this.eclairages[i].statut = '1';
  }

  switchOffOne(i: number) {
    this.eclairages[i].statut = '0';
  }


}
