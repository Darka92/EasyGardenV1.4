import { Component, OnInit , OnDestroy } from '@angular/core';


/*  MES IMPORTS */

/*  SERVICES  */

import { BassinService } from 'src/app/services/bassin.service';



@Component({
  selector: 'app-bassin',
  templateUrl: './bassin.component.html',
  styleUrls: ['./bassin.component.css']
})



export class BassinComponent implements OnInit, OnDestroy {

  data;

  index: number;

  constructor(private bassinService: BassinService) {

    this.data = this.bassinService.bassin;
    /*console.log(this.data);*/

  }

  ngOnInit() {
  }

  ngOnDestroy() {
  }

  getColor( statut) {
    if ( statut === 'On') {
      return 'green';
    } else if ( statut === 'Off') {
      return 'red';
    }
  }

  onSwitch(i, statut) {
    if (statut === 'On') {
      this.bassinService.switchOffOne(i);
    } else if (statut === 'Off') {
      this.bassinService.switchOnOne(i);
    }
  }

  
}
