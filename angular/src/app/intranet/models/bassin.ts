/*  MES IMPORTS  */
import {Deserializable} from './deserializable';


export class Bassin implements Deserializable {
    public bassinId: number;
    public nom: string;
    public statut: boolean;

    
    deserialize(input: any) {
        Object.assign(this, input);
        return this;
      }


}