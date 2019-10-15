import { Component, OnInit, OnDestroy } from '@angular/core';


/*  MES IMPORTS */

/*  ANGULAR  */
import { Router } from '@angular/router';

/*  SERVICES */
import { TondeusesService } from 'src/app/services/tondeuses.service';



@Component({
  selector: 'app-tondeuse',
  templateUrl: './tondeuse.component.html',
  styleUrls: ['./tondeuse.component.css']
})



export class TondeuseComponent implements OnInit, OnDestroy {

  tondeuses = [];

  constructor(private tondeuseService: TondeusesService, private router:Router) {}

  index: number;

  ngOnInit() {
    // Appeler méthode de service
    this.tondeuses = this.tondeuseService.tondeuses;
    console.log(this.tondeuses);
  }

  ngOnDestroy() {
  }

  getColor(statut: boolean) {
    if (statut === true) {
      return 'green';
    } else if (statut === false) {
      return 'red';
    }
  }

  onSwitch(i: number, statut: boolean) {
    if (statut === true) {
      this.tondeuseService.switchOffOne(i);
    } else if (statut === false) {
      this.tondeuseService.switchOnOne(i);
    }
  }

  
}
