import { TestBed } from '@angular/core/testing';

import { TondeusesService } from './tondeuses.service';

describe('TondeusesService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: TondeusesService = TestBed.get(TondeusesService);
    expect(service).toBeTruthy();
  });
});
