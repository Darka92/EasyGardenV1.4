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

  getColor(statut) {
    if (statut === '1') {
      return 'green';
    } else if (statut === '0') {
      return 'red';
    }
  }

  onSwitch(i, statut) {
    if (statut === '1') {
      this.tondeuseService.switchOffOne(i);
    } else if (statut === '0') {
      this.tondeuseService.switchOnOne(i);
    }
  }

  
}
