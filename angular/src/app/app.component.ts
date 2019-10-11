import { Component, OnInit  } from '@angular/core';


/*  MES IMPORTS  */

/*  SERVICES  */
import { EclairageService } from './services/eclairage.service';
import { ArrosageService } from './services/arrosage.service';
import { BassinService } from './services/bassin.service';
import { TondeuseService } from './services/tondeuse.service';
import { PortailService } from './services/portail.service';



@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})


export class AppComponent implements OnInit {

  isAuth = false;

  eclairage: any[];
  arrosage: any[];
  bassin: any[];
  tondeuse: any[];
  portail: any[];
  someArrayOfThings: any[];

  p: number = 1;
  collection: any[] = this.someArrayOfThings;

  constructor(private eclairageService: EclairageService,
              private arrosageService: ArrosageService, private bassinService: BassinService,
              private tondeuseService: TondeuseService, private portailService: PortailService) {

    setTimeout(
      () => {
        this.isAuth = true;
      }, 4000
    );
  }

  ngOnInit() {
    this.eclairage = this.eclairageService.eclairage;
    this.arrosage = this.arrosageService.arrosage;
    this.bassin = this.bassinService.bassin;
    this.tondeuse = this.tondeuseService.tondeuse;
    this.portail = this.portailService.portail;
  }

}

