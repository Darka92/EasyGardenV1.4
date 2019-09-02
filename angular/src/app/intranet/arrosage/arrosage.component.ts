import { Component, OnInit, OnDestroy } from '@angular/core';
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

    /*console.log(this.data);*/

    this.data = this.arrosageService.arrosage;
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
      this.arrosageService.switchOffOne(i);
    } else if (statut === 'Off') {
      this.arrosageService.switchOnOne(i);
    }
  }

}
