/*  MES IMPORTS  */
import {Deserializable} from './deserializable';


export class Portail implements Deserializable {
    public portailId: number;
    public nom: string;
    public localisation: string;
    public capteurPresence: number;
    public statut: boolean;


    deserialize(input: any) {
        Object.assign(this, input);
        return this;
      }
   
      
}