/*  MES IMPORTS  */
/*import {Deserializable} from './deserializable';*/


export class Arrosage {

  constructor(public arrosageId : number, public nom :string, public localisation:string, public capteurDebit: string, public capteurPression: string, public statut: string) {}

  /*public arrosageId: number;
  public nom: string;
  public localisation: string;
  public capteurDebit: number;
  public capteurPression: number;
  public statut: boolean;*/


  /*deserialize(input: any) {
      Object.assign(this, input);
      return this;
    }*/
      

}