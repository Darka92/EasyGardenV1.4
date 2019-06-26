import { TestBed } from '@angular/core/testing';

import { ArrosageService } from './arrosage.service';

describe('ArrosageService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ArrosageService = TestBed.get(ArrosageService);
    expect(service).toBeTruthy();
  });
});
