/*  MES IMPORTS  */
/*import {Deserializable} from './deserializable';*/

/*  MODELS  */
import {Jardin} from "src/app/intranet/models/jardin";


export class User {
    public userId: number;
    public nom: string;
    public jardins: Jardin[];


    /*deserialize(input: any): this {

        // Assign input to our object BEFORE deserialize our cars to prevent already deserialized jardins from being overwritten.
        Object.assign(this, input);

        // Iterate over all jardins for our user and map them to a proper `Jardin` model
        this.jardins = input.jardins.map((jardin: any) => new Jardin().deserialize(jardin));

        return this;
      }*/


}
