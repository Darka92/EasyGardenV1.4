import { Injectable } from '@angular/core';

/* MES IMPORTS  */
import { Bassin } from 'src/app/intranet/models/bassin';



@Injectable({
  providedIn: 'root'
})



export class BassinsService {

  bassins: Bassin []=[];

  constructor() {

    let bassins1: Bassin = new Bassin (1,'Pompe',true);
    let bassins2: Bassin = new Bassin (2,'Cascade',false);
    let bassins3: Bassin = new Bassin (3,'Jet 1',true);
    let bassins4: Bassin = new Bassin (4,'Jet 2',false);
    let bassins5: Bassin = new Bassin (5,'Skimmer',false);
    let bassins6: Bassin = new Bassin (6,'Roue',true);

    this.bassins.push(bassins1);
    this.bassins.push(bassins2);
    this.bassins.push(bassins3);
    this.bassins.push(bassins4);
    this.bassins.push(bassins5);
    this.bassins.push(bassins6);
    

  }

  public getBassins():Bassin[] {
    return this.bassins;
    /*console.log(this.bassins);*/
  }

  public getBassin(bassinId:number):Bassin{
    let tableaubassin=this.getBassins();
    return tableaubassin.find(i=>i.bassinId===bassinId);
  };

  switchOnOne(i: number) {
    this.bassins[i].statut = true;
  }

  switchOffOne(i: number) {
    this.bassins[i].statut = false;
  }
}
