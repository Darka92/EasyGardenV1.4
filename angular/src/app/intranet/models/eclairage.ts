/*  MES IMPORTS  */
import {Deserializable} from './deserializable';


   export class Eclairage implements Deserializable {
    public eclairageId: number;
    public nom: string;
    public localisation: string;
    public capteurDefautAmpoule: boolean;
    public capteurLuminosite: number;
    public statut: boolean;


    deserialize(input: any) {
        Object.assign(this, input);
        return this;
      }
   
      
}