/*  MES IMPORTS  */
import {Deserializable} from './deserializable';


export class Tondeuse implements Deserializable {
    public tondeuseId: number;
    public nom: string;
    public capteurBatterie: number;
    public statut: boolean;


    deserialize(input: any) {
        Object.assign(this, input);
        return this;
      }
  
      
}