/*  MES IMPORTS  */
import {Deserializable} from './deserializable';

/*  MODELS  */
import {Arrosage} from "src/app/intranet/models/arrosage";
import {Eclairage} from "src/app/intranet/models/eclairage";
import {Bassin} from "src/app/intranet/models/bassin";
import {Tondeuse} from "src/app/intranet/models/tondeuse";
import {Portail} from "src/app/intranet/models/portail";


export class Jardin implements Deserializable {
    public jardinId: number;
    public nom: string;
    public arrosages: Arrosage[];
    public eclairages: Eclairage[];
    public bassins: Bassin[];
    public tondeuses: Tondeuse[];
    public portails: Portail[];


    deserialize(input: any): this {

        // Assign input to our object BEFORE deserialize our cars to prevent already deserialized Object from being overwritten.
        Object.assign(this, input);

        // Iterate over all Objects for our jardin and map them to a proper `Object` model
        this.arrosages = input.arrosages.map(arrosage => new Arrosage().deserialize(arrosage));
        this.eclairages = input.eclairages.map(eclairage => new Eclairage().deserialize(eclairage));
        this.bassins = input.bassins.map(bassin => new Bassin().deserialize(bassin));
        this.tondeuses = input.tondeuses.map(tondeuse => new Tondeuse().deserialize(tondeuse));
        this.portails = input.portails.map(portail => new Portail().deserialize(portail));

        return this;
      }

      
}