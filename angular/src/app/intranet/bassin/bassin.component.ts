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

  getColor( statut) {
    if ( statut === '1') {
      return 'green';
    } else if ( statut === '0') {
      return 'red';
    }
  }

  onSwitch(i, statut) {
    if (statut === '1') {
      this.bassinService.switchOffOne(i);
    } else if (statut === '0') {
      this.bassinService.switchOnOne(i);
    }
  }

  
}
