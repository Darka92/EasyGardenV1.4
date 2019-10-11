import { Component, OnInit, OnDestroy } from '@angular/core';


/*  MES IMPORTS */

/*  SERVICES */
import { TondeuseService } from 'src/app/services/tondeuse.service';



@Component({
  selector: 'app-tondeuse',
  templateUrl: './tondeuse.component.html',
  styleUrls: ['./tondeuse.component.css']
})



export class TondeuseComponent implements OnInit, OnDestroy {

  data;

  index: number;

  constructor(private tondeuseService: TondeuseService) {

    this.data = this.tondeuseService.tondeuse;

    /*console.log(this.data);*/

  }

  ngOnInit() {
  }

  ngOnDestroy() {
  }

  getColor(statut) {
    if (statut === 'On') {
      return 'green';
    } else if (statut === 'Off') {
      return 'red';
    }
  }

  onSwitch(i, statut) {
    if (statut === 'On') {
      this.tondeuseService.switchOffOne(i);
    } else if (statut === 'Off') {
      this.tondeuseService.switchOnOne(i);
    }
  }

  
}
