import { Component, OnInit, OnDestroy } from '@angular/core';


/*  MES IMPORTS */

/*  SERVICES  */
import { ArrosageService } from 'src/app/services/arrosage.service';



@Component({
  selector: 'app-arrosage',
  templateUrl: './arrosage.component.html',
  styleUrls: ['./arrosage.component.css'],
})



export class ArrosageComponent implements OnInit, OnDestroy {

  data;

  index: number;

  constructor(private arrosageService: ArrosageService) {

    this.data = this.arrosageService.arrosage;

    /*console.log(this.data);*/

  }

  ngOnInit() {
    // Appeler méthode de service
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
      this.arrosageService.switchOffOne(i);
    } else if (statut === 'Off') {
      this.arrosageService.switchOnOne(i);
    }
  }


}
