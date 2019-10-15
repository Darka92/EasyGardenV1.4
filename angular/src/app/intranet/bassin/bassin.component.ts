import { Component, OnInit , OnDestroy } from '@angular/core';


/*  MES IMPORTS */

/*  ANGULAR  */
import { Router } from '@angular/router';

/*  SERVICES  */

import { BassinsService } from 'src/app/services/bassins.service';



@Component({
  selector: 'app-bassin',
  templateUrl: './bassin.component.html',
  styleUrls: ['./bassin.component.css']
})



export class BassinComponent implements OnInit, OnDestroy {

  bassins = [];

  constructor(private bassinService: BassinsService, private router:Router) {}

  index: number;

  ngOnInit() {
    // Appeler méthode de service
    this.bassins = this.bassinService.bassins;
    /*console.log(this.bassins);*/
  }

  ngOnDestroy() {
  }

  getColor(statut: boolean) {
    if ( statut === true) {
      return 'green';
    } else if ( statut === false) {
      return 'red';
    }
  }

  onSwitch(i: number, statut: boolean) {
    if (statut === true) {
      this.bassinService.switchOffOne(i);
    } else if (statut === false) {
      this.bassinService.switchOnOne(i);
    }
  }

  
}
