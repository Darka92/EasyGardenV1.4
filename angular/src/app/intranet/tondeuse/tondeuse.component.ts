import { Component, OnInit, OnDestroy } from '@angular/core';
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

    /*console.log(this.data);*/

    this.data = this.tondeuseService.tondeuse;

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
