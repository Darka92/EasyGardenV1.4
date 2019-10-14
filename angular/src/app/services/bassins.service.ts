import { Injectable } from '@angular/core';

/* MES IMPORTS  */
import { Bassin } from 'src/app/intranet/models/bassin';



@Injectable({
  providedIn: 'root'
})



export class BassinsService {

  bassins: Bassin []=[];

  constructor() {

    let bassins1: Bassin = new Bassin (1,'Pompe','1');
    let bassins2: Bassin = new Bassin (2,'Cascade','0');
    let bassins3: Bassin = new Bassin (3,'Jet 1','1');
    let bassins4: Bassin = new Bassin (4,'Jet 2','0');
    let bassins5: Bassin = new Bassin (5,'Skimmer','0');
    let bassins6: Bassin = new Bassin (6,'Roue','1');

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
    this.bassins[i].statut = '1';
  }

  switchOffOne(i: number) {
    this.bassins[i].statut = '0';
  }
}
