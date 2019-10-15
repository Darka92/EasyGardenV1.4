import { Injectable } from '@angular/core';


/* MES IMPORTS  */
import { Tondeuse } from 'src/app/intranet/models/tondeuse';



@Injectable({
  providedIn: 'root'
})



export class TondeusesService {

  tondeuses: Tondeuse []=[];

  constructor() { 

    let tondeuses1: Tondeuse = new Tondeuse (1,'Tondeuse avant', '10', '1');
    let tondeuses2: Tondeuse = new Tondeuse (2,'Tondeuse arrière', '50', '0');

    this.tondeuses.push(tondeuses1);
    this.tondeuses.push(tondeuses2);

  }

  public getTondeuses():Tondeuse[] {
    return this.tondeuses;
    /*console.log(this.tondeuses);*/
  }

  public getArrosage(tondeuseId:number):Tondeuse{
    let tableautondeuse=this.getTondeuses();
    return tableautondeuse.find(i=>i.tondeuseId===tondeuseId);
  };

  switchOnOne(i: number) {
    this.tondeuses[i].statut = '1';
  }

  switchOffOne(i: number) {
    this.tondeuses[i].statut = '0';
  }

}
